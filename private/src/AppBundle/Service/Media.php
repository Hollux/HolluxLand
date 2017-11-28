<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManager;

//TODO FAIRE GESTION MEDIA QUAND MEDIA
class Media
{
    protected $em;
    protected $targetPath;

    public function __construct(EntityManager $em, $targetPath)
    {
        $this->em = $em;
        $this->targetPath = $targetPath;
    }

    /**
     * @return EntityManager
     */
    public function getEm(): EntityManager
    {
        return $this->em;
    }

    /**
     * @return mixed
     */
    public function getTargetPath()
    {
        return $this->targetPath;
    }

    public function getMedia($uri)
    {

        $mediaRepository = $this->em
            ->getRepository('AppBundle:Media');

        $medias = $mediaRepository->findMediaByUri($uri);

        //TODO VERIFICATION UN SEUL MEDIA ?
        foreach ($medias as $media) {

            return $media;
        }

        return null;
    }
}