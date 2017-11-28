<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Soit cherche media avec la base de donné(retiré car pas d'entity media)
//Ou vérifie si c'est dans uploadPath
//Ou si c'est dans webPath
//Sinon Error
//Retourne le File.
class UriToFile
{
    /**
     * @var \AppBundle\Service\Media
     */
    protected $mediaService;

    /**
     * @var string
     */
    protected $uploadPath;

    /**
     * @var string
     */
    protected $webPath;

    /**
     * @return Media
     */
    public function getMediaService(): Media
    {
        return $this->mediaService;
    }

    /**
     * @return string
     */
    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    /**
     * @return string
     */
    public function getWebPath()
    {
        return $this->webPath;
    }

    /**
     * UriToFile constructor.
     * @param Media $mediaService
     * @param string $uploadPath
     * @param string $webPath
     */
    public function __construct($uploadPath, $webPath/*, Media $mediaService*/)
    {
        $this->uploadPath = $uploadPath;
        $this->webPath = $webPath;
        //$this->mediaService = $mediaService;
    }

    /**
     * find by uri.
     *
     * @param Media $mediaService
     * @param string $uri
     * @param bool $useDns |default = true
     *
     * @return File|NotFoundHttpException
     */
    public function find($uri)
    {
        $media = null;//$this->mediaService->getMedia($uri, $useDns);

        //TODO cherche media avec l'objet media
        if (null !== null/*$media  && $media->getFile() instanceof File*/) {
            $file = $media->getFile();
        } else if (is_file($this->uploadPath . $uri)) {
            $file = new File($this->uploadPath . $uri);
        } else if (is_file($this->webPath . 'img/' . $uri)) {
            $file = new File($this->webPath . 'img/' . $uri);
        } else {
            throw new NotFoundHttpException('file_not_found');
        }

        return $file;
    }
}