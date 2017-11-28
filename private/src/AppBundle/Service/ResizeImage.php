<?php
namespace AppBundle\Service;

use Psr\Cache\CacheItemPoolInterface;

class ResizeImage
{
    protected $imagePathToResource;
    private $cache;

    public function __construct(ImagePathToResource $imagePathToResource, CacheItemPoolInterface $cache)
    {
        $this->imagePathToResource = $imagePathToResource;
        $this->cache = $cache;
    }

    public function resize_image($sourceFile, int $w, int $h, $destinationFile, $crop = false)
    {
        //mkdir if needed
        if (!is_dir(dirname($destinationFile)))
            mkdir(dirname($destinationFile));

        // Is readable ?
        if (!is_readable($sourceFile))
            return null;

        // Is an image ?
        if (!@is_array(getimagesize($sourceFile))) {
            return null;
        }

        $resizedCacheItem = $this->cache->getItem('resize' . md5($destinationFile) . filemtime($sourceFile));

        // WTF C'EST QUOI CA ??
        if ($dataFile = $resizedCacheItem->get())
            return $dataFile;

        if (!is_file($destinationFile) ||
            filemtime($sourceFile) > filemtime($destinationFile)
        ) {
            $src = $this->imagePathToResource->getResource($sourceFile);
            if (!$src)
                return null;

            list($width, $height) = getimagesize($sourceFile);

            $r = $width / $height;

            if ($crop) {
                if ($width > $height) {
                    $width = ceil($width - ($width * abs($r - $w / $h)));
                } else {
                    $height = ceil($height - ($height * abs($r - $w / $h)));
                }
                $newwidth = $w;
                $newheight = $h;
            } else {
                if ($w / $h > $r) {
                    $newwidth = $h * $r;
                    $newheight = $h;
                } else {
                    $newheight = $w / $r;
                    $newwidth = $w;
                }
            }

            $dst = imagecreatetruecolor($w, $h);
            $background = imagecolorallocate($dst, 255, 255, 255);      // white color
            imagefill($dst, 0, 0, $background);
            imagecopyresampled($dst, $src, ($w - $newwidth) / 2, ($h - $newheight) / 2, 0, 0, $newwidth, $newheight, $width, $height);

            // Create image
            imagejpeg($dst, $destinationFile);

        }

        $dataFile = file_get_contents($destinationFile);

        // Save to cache
        $resizedCacheItem->set($dataFile);
        $this->cache->save($resizedCacheItem);
        $this->cache->commit();

        return $dataFile;
    }
}