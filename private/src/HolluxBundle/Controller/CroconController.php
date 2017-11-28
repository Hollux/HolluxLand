<?php
namespace HolluxBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CroconController extends Controller
{
    /**
     * @Route("/croton", name="croton")
     * @Template
     */
    public function crotonAction()
    {

        return [];
    }

}