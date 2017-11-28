<?php
namespace UserBundle\Event;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\EventDispatcher\Event;

class TotoEvent extends Event
{
    private $user;
    private $result = [];

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {

        return $this->user;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function addResult($object)
    {
        $this->result[]= $object;
    }
}