<?php
namespace AppBundle\Listener\ORM;

use AppBundle\Entity\SuperClass\Date;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DatePrepersistEventListener
{
    protected $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $this->datePersist($args->getEntity());

    }

    public function datePersist($entity)
    {
        if (in_array(Date::class, class_uses($entity))) {
            $entity->setCreatedad(new \DateTime());
        }
    }

}