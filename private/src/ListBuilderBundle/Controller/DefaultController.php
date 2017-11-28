<?php
namespace ListBuilderBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/listbuilde")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homeListBuilder")
     * @Template
     */
    public function homeListBuilderAction()
    {
        return [];
    }
}
