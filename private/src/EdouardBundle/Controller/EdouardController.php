<?php
namespace EdouardBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/edouard")
 */
class EdouardController
{
    /**
     * @Route("/", name="indexedouard")
     * @Template
     */
    public function indexedouardAction()
    {

        return [];
    }

}