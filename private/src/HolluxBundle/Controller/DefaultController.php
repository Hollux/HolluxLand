<?php
namespace HolluxBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/hollux")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homeHollux")
     * @Template
     */
    public function homeHolluxAction()
    {
        return [];
    }
}
