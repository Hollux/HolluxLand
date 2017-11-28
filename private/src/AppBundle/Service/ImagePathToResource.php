<?php
namespace AppBundle\Service;


class ImagePathToResource
{
    public function getResource($source)
    {
        $imgType = exif_imagetype($source);

        switch($imgType) {
            case IMAGETYPE_JPEG: return imagecreatefromjpeg($source); break;
            case IMAGETYPE_PNG: return imagecreatefrompng($source); break;
            case IMAGETYPE_GIF: return imagecreatefromgif($source); break;
            case IMAGETYPE_BMP: return imagecreatefromwbmp($source); break;
        }

        return false;
    }

}