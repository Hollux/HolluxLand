<?php
namespace ListBuilderBundle\Controller;

use ListBuilderBundle\Repository\ListeRepository;
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
        $em = $this->getDoctrine()->getManager();

        $ListeRepository = $em->getRepository("ListBuilderBundle:Liste");
        $listeTest       = $ListeRepository->findByTitle('Liste Exemple')[0];

        return ['listeTest' => $listeTest];
    }
}
