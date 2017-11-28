<?php

namespace MediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/Media")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homeMedia")
     * @Template
     */
    public function homeMediaAction()
    {
        return [];
    }
}
