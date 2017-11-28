<?php
namespace Admin\NavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Admin\NavBundle\Entity\Nav;

class PageController extends Controller
{
    /**
     * @Route("/page/{page}", name="page",
     * requirements={"page" = "[a-zA-Z0-9-]+"})
     * @Template
     */
    public function pageAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $element = $em->getRepository('AdminNavBundle:Nav')->findOneByUrl($page);

        if($page !== null)
        {
            if($element)
            {
                return['element' => $element];
            } elseif (in_array($page))
            {
                $this->redirectToRoute($page);
            }
        }

        $this->redirectToRoute('error', $page);
    }

    /**
     * @Route("/{page}.html", name="page_special",
     * requirements={"page" = "[a-zA-Z0-9-]+"})
     * @Template
     */
    public function pageSpecialAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $element = $em->getRepository('AdminNavBundle:Nav')->findOneByUrl($page);

        if($element) {
            $this->redirectToRoute('page', ['page' => $element->getUrl()]);
        }

        $this->redirectToRoute('error', $page);
    }

}