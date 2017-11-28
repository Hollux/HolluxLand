<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/app")
 */
class DefaultController extends Controller
{
	/**
     * @Route("/appHome", name="homepageSymfony")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',
            ['base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),]);
    }

    /**
     * @Route("/", name="homeApp")
     * @Template
     */
    public function homeAppAction()
    {
        return [];
    }
}
