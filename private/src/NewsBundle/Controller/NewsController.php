<?php
namespace NewsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HolluxBundle\Form;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    /**
     * @Route("/news", name="news")
     * @Template
     */
    public function newsAction()
    {
        $fruits = ["banane", 'pomme'];
        $em = $this->get('doctrine.orm.entity_manager');
        $news = $em->getRepository('NewsBundle:News')->get20NewsVisibleBydate();

        return ['news' => $news, 'fruits' => $fruits];
    }

    /**
     * @Route("/newsAdmin/{page}", name="newsAdmin")
     * @Template
     * requirements={"page" = "\d+"})
     */
    public function newsAdminAction($page = 1)
    {
        $firstResult = ($page -1)*20;
        $em = $this->get('doctrine.orm.entity_manager');
        $news = $em->getRepository('NewsBundle:News')->getNewsForAdmin($firstResult);

        return ['news' => $news];
    }

    /**
     * @Route("/newsCreateEdit/{id}", name="newsCreateEdit")
     * @Template
     * requirements={"id" = "\d+"})
     */
    public function newsCreateEditAction($id = null, Request $request)
    {
        // creation / submit form
        $form = $this->get('NewsHandler')->CreateEditAction($id, $request);

        //si submit, $form = nouvelle route
        if(is_string($form))
            return $this->redirect($form);

        return ['form' => $form->createview()];
    }
}