<?php
namespace AppBundle\Listener\ORM;

use AppBundle\Entity\SuperClass\MediaTrait;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;

class DynamicMediaSubscriber implements EventSubscriber
{
    private $media;

    public function __construct($media)
    {
        $this->media = $media;
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            Events::loadClassMetadata,
        );
    }

    /**
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        // the $metadata is the whole mapping info for this class
        $metadata = $eventArgs->getClassMetadata();

        if (!in_array(MediaTrait::class, class_uses($metadata->getName())))
            return;

        $namingStrategy = $eventArgs
            ->getEntityManager()
            ->getConfiguration()
            ->getNamingStrategy()
        ;
        /* var_dump($namingStrategy->classToTableName($metadata->getName()));exit;*/

        $metadata->mapOneToOne(array(
            'targetEntity'  => $this->media,
            'fieldName'     => 'media',
            'cascade'       => array('persist', "remove"),
            'joinTable'     => array(
                'name'        => $namingStrategy->classToTableName($metadata->getName()),
                'joinColumns' => array(
                    array(
                        'name'                  => 'media_id',
                        'referencedColumnName'  => 'id',
                        'nullable'  =>  true,
                        'onDelete'  => 'set null',
                        'onUpdate'  => 'CASCADE',
                    ),
                ),
            )
        ));
    }

}