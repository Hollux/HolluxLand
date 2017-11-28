<?php
namespace AppBundle\Listener\ORM;

use AppBundle\Entity\SuperClass\Date;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DatePreUploadEventListener
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $this->dateUpdate($args->getEntity());
    }


    public function dateUpdate($entity)
    {
        if (in_array(Date::class, class_uses($entity))) {
            $entity->setUpdatedat(new \DateTime());
        }
    }

}