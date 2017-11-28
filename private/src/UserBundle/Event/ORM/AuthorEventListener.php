<?php
namespace UserBundle\Event\ORM;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use UserBundle\Entity\SuperClass\Author;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class AuthorEventListener
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $this->authorUpdate($args->getEntity());
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->authorUpdate($args->getEntity());

    }


    public function authorUpdate($entity)
    {

        if (in_array(Author::class, class_uses($entity))) {
            $user = $this->tokenStorage->getToken()->getUser();
            $entity->setAuthor(is_string($user) ? $user : $user->getName());
        }
    }
}