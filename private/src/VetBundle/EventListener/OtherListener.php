<?php
namespace VetBundle\EventListener;

use VetBundle\Entity;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class OtherListener
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

    }

}