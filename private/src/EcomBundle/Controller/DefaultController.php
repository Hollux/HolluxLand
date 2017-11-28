<?php
namespace EcomBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/ecom")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homeEcom")
     * @Template
     */
    public function homeEcomAction()
    {
        return [];
    }
}
