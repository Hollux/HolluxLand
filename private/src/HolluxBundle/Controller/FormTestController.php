<?php
namespace HolluxBundle\Controller;

use HolluxBundle\Entity\Veterinaire;
use HolluxBundle\Form\VetFormTestType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/formtest")
 */
class FormTestController extends Controller
{
    /**
     * @Route("/create", name="formimbriqueCreate")
     * @Template
     */
    public function formimbriqueAction(Request $request)
    {
        $veto = new Veterinaire();
        $form = $this->createForm(VetFormTestType::class, $veto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($veto);
            $em->flush();
            echo'Done';exit;
        }

        return ['form' => $form->createview()];
    }

    /**
     * @Route("/show", name="showformtest")
     * @Template
     */
    public function showformtestAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vetos = $em->getRepository('HolluxBundle:Veterinaire')->findAll();

        return ['vetos' => $vetos];
    }

    /**
     * @Route("/edit/{id}", name="editformtest")
     * @Template
     */
    public function editformtestAction(Request $request, $id = null)
    {
        if(null == $id)
        {
            echo'ERROR ID NULL !!!';exit;
        }
        $em = $this->getDoctrine()->getManager();
        $veto = $em->getRepository('HolluxBundle:Veterinaire')->findOneById($id);
        $form = $this->createForm(VetFormTestType::class, $veto);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($veto);
            $em->flush();
            echo'Done';exit;
        }

        return ['form' => $form->createview()];
    }

}