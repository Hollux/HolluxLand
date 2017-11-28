<?php
namespace MediaBundle\EventListener\ORM;

use MediaBundle\Entity\SuperMedia as Media;
use MediaBundle\EventListener\EventListener;
use MediaBundle\Service\FileUploader;
use MediaBundle\Service\StringCleaner;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class UploadListener extends EventListener
{
    private $uploader;
    private $stringCleaner;
    private $targetPath;

    public function __construct(FileUploader $uploader, StringCleaner $stringCleaner, $targetPath)
    {
        $this->uploader = $uploader;
        $this->targetPath = $targetPath;
        $this->stringCleaner = $stringCleaner;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        // upload only works for Media entities
        if (!$entity instanceof Media) {
            return;
        }

        $file = $entity->getFile();

        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }

        // Upload file
        $fileName = $this->uploader->upload($file,
            $entity->getFolder());


        $entity->setFile($fileName);


        // Compute url if needed
        if(null == $entity->getUrl()) {
            $entity->setUrl($this->stringCleaner->urlCleaner($file->getClientOriginalName()));
        }
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        // force file only works for Media entities
        if (!$entity instanceof Media) {
            return;
        }

        // auto load file if needed
        $fileName = $entity->getFile();
        if('' != $fileName && !$fileName instanceof File) {
            // Compute path of file
            $subfolder = $entity->getFolder() != null ? $entity->getFolder(): '';

            // Load file
            $pathFile = $this->targetPath.'/' . $subfolder . '/' . $fileName;
            $entity->setFile(new File($pathFile));
        }
    }
}