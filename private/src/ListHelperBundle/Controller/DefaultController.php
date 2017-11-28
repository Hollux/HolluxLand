<?php
namespace ListHelperBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/ListHelper")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/helperdefault", name="helperdefault")
     */
    public function helperdefaultAction()
    {
        echo'helpDefautController';exit;
    }

    /**
     * @Route("/", name="homeListHelper")
     * @Template
     */
    public function homeListHelperAction()
    {
        return [];
    }

}