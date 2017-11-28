<?php
namespace AppBundle\Listener\ORM;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class SoftDeleteEventListener
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function preFlush(PreFlushEventArgs $event)
    {
        $em = $event->getEntityManager();

        foreach ($em->getUnitOfWork()->getScheduledEntityDeletions() as $object) {
            //echo 'erre';exit;
            if (method_exists($object, "getDeletedAt")) {

                if ($object->getDeletedAt() instanceof \Datetime) {
                    continue;
                } else {
                    if (method_exists($object, "setDeletedBy")) {

                        $user = $this->tokenStorage->getToken()->getUser();

                        $object->setDeletedBy( is_string($user) ? $user : $user->getName());
                    }

                    $object->setDeletedAt(new \DateTime());
                    $em->merge($object);

                    $em->persist($object);
                }
            }
        }
    }
}