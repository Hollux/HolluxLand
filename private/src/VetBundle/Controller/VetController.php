<?php
namespace VetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use VetBundle\Component\AnabelArrays;

/**
 * @Route("/vet")
 */
class VetController extends Controller
{
    /**
     * @Route("/", name="vethome")
     * @Template
     */
    public function vethomeAction()
    {
        return [];
    }

    //TODO rajouter {id}Base avec findById.
    //TODO Puis passer l'analyse correspondante.
    /**
     * @Route("/analyse/{analyse}/{id}", name="analyse")
     */
    public function vetanalyseAction($analyse, $id)
    {
        //KESAKO
        /*if(isset((AnabelArrays::All)[$analyse]))
        {
           $this->get('VetHandler')->getFormAnalyse();
        }*/

        if(isset((AnabelArrays::All)[$analyse]))
        {
            $em = $this->get("doctrine.orm.entity_manager");
            $val = $em->getRepository("VetBundle:$analyse")->findOneById($id);

            return $this->render("VetBundle::Vet/".$analyse."val.html.twig", ['val' => $val]);

        } else {
            echo "l'analyse n'existe pas"; exit;
        }

        return false;
    }

    /**
     * @Route("/newanalyse/{analyse}", name="createAnalyse")
     * @Template
     */
    public function vetnewanalyseAction($analyse)
    {

        if(isset((AnabelArrays::All)[$analyse]))
        {
            $class = 'VetBundle\\Entity\\'.$analyse;
            $toto = new $class();
            $this->getDoctrine()->getEntityManager()->persist($toto);
            $this->getDoctrine()->getEntityManager()->flush();

            echo'DONE';
            dump($toto);exit;

        }

        echo'error'; exit;


        return [];
    }

    //TODO rajouter {id}Base avec findById.
    //TODO Puis passer l'analyse correspondante.
    /**
     * @Route("/analyseedit/{analyse}", name="analyseedit")
     */
    public function vetanalyseEditAction($analyse, Request $request)
    {
        if(isset((AnabelArrays::All)[$analyse]))
        {
            $entityClass = '\\VetBundle\\Entity\\'.$analyse;
            $entity = new $entityClass();
            $form = $this->createForm('\\VetBundle\\Form\\'.$analyse.'Type', $entity);
        } else {
            echo "l'analyse n'existe pas"; exit;
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $request->getSession()->getFlashBag()->add('success', 'analyse sav correctly');
        } else {

            $request->getSession()->getFlashBag()->add('error', 'error');
        }

        return $this->render("VetBundle::Vet/$analyse.html.twig", ['form' => $form->createView()]);
    }

}