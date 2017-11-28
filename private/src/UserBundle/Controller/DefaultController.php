<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/user")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homeUser")
     * @Template
     */
    public function homeUserAction()
    {
        return [];
    }
}
