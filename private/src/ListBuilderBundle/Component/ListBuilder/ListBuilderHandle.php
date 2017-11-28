<?php
namespace ListBuilderBundle\Component\ListBuilder;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManager;

class ListBuilderHandle
{
    private $em;
    private $formFactory;
    private $session;
    private $listBuilder;

    public function __construct(Entitymanager $em,
                                FormFactoryInterface $formFactory,
                                SessionInterface $session,
                                ListBuilder $listBuilder)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->session = $session;
        $this->listBuilder = $listBuilder;
    }

}