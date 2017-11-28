<?php
namespace NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/news")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homeNews")
     * @Template
     */
    public function homeNewsAction()
    {
        return [];
    }
}
