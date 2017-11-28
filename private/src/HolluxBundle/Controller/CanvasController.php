<?php
namespace HolluxBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class CanvasController
{
    /**
     * @Route("/canvas", name="canvas")
     * @Template
     */
    public function canvasAction()
    {
        return [];
    }

}