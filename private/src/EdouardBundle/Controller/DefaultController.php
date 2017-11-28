<?php

namespace EdouardBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/edouard")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/bundle", name="homeEdouard")
     * @Template
     */
    public function homeEdouardAction()
    {

        return [];
    }
}
