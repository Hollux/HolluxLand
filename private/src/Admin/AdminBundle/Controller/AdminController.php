<?php
namespace Admin\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/", name="adminhome")
     * @Template
     */
    public function adminhomeAction()
    {
        dump($this->getParameter('navAdmin'));

        return [];
    }

}