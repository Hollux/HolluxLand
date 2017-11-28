<?php
namespace HolluxBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Component\Mailer\Message;
use HolluxBundle\Form;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/tutos")
 */
class TutosController extends Controller
{
    /**
     * @Route("/", name="indexTutos")
     * requirements={"type" = "soft|hard"})
     */
    public function indexTutosAction()
    {
        $type = $this->get('GetTypeOfTuto')->getTypeOfTuto();

        return $this->render('HolluxBundle::Tutos/'.$type.'/indexTutos.html.twig', []);
    }

    //Gestion SESSION
    /**
     * @Route("/softcore/{route}", name="softcore")
     */
    public function softcoreAction($route = 'indexTutos')
    {
        $session = new Session();

        // le set
        $session->set('tutotype', 'soft');

        return $this->redirecttoroute($route);

    }

    /**
     * @Route("/hardcore/{route}", name="hardcore")
     */
    public function hardcoreAction($route = 'indexTutos')
    {
        $session = new Session();

        // le set
        $session->set('tutotype', 'hard');

        return $this->redirecttoroute($route);
    }
    ///Gestion SESSION



    /**
     * @Route("/generateur", name="generateur")
     * @Template
     */
    public function generateurAction()
    {

        return [];
    }

    //SECTION BOOTSTRAP

    /**
     * @Route("/kesako", name="kesako")
     */
    public function kesakoAction()
    {
        $type = $this->get('GetTypeOfTuto')->getTypeOfTuto();

        return $this->render('HolluxBundle::Tutos/'.$type.'/kesako.html.twig', []);
    }

    /**
     * @Route("/grid", name="grid")
     */
    public function gridAction()
    {
        $type = $this->get('GetTypeOfTuto')->getTypeOfTuto();

        return $this->render('HolluxBundle::Tutos/'.$type.'/grid.html.twig', []);
    }

    //TODO a quoi sers ce truc?
    /**
     * @Route("/jsalcyon", name="jsalcyon")
     * @Template
     */
    public function jsalcyonAction()
    {

        return [];
    }


    /**
     * @Route("/boiteaidee", name="boiteaidee")
     */
    public function boiteaideeAction($type = 'soft', Request $request)
    {
        $type = $this->get('GetTypeOfTuto')->getTypeOfTuto();

        $form = $this->get('form.factory')->create(Form\BoiteaideeType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $body = $this->get('templating')->render('Mail/boiteaidee.html.twig',
                ['content' => $form->get('content')->getData(), 'email' => $form->get('email')->getData(),
                    'time' => date("Y-m-d H:i:s")]);
            $this->get('appbundle.component.mailer')->send(new Message(
                    'Boite a idee Hollux.fr',
                    'hollux@hollux.fr',
                    ['holluxpanda@gmail.com', 'hollux@hollux.fr'],
                    $body)
            );
            $request->getSession()->getFlashBag()->add('success', "Message envoyé avec succès");
        }

        return $this->render('HolluxBundle::Tutos/'.$type.'/boiteaidee.html.twig', ['form' => $form->createview()]);
    }

    // SECTION FORM BOOTSTRAP

    /**
     * @Route("/enform", name="enform")
     */
    public function enformAction(Request $request)
    {
        $type = $this->get('GetTypeOfTuto')->getTypeOfTuto();

        $form1 = $this->get('form.form'.$type.'1')->handleRequest($request);
        $form2 = $this->get('form.form'.$type.'2')->handleRequest($request);
        $form3 = $this->get('form.form'.$type.'3')->handleRequest($request);
        $form6 = $this->get('form.form'.$type.'6')->handleRequest($request);
        $form8 = $this->get('form.form'.$type.'8')->handleRequest($request);

        if(is_array($form1))
        {
            return $this->forward('AppBundle:TutoForm:formView',[
                'data'  => $form1
            ]);
        }

        if(is_array($form2))
        {
            return $this->forward('AppBundle:TutoForm:formView',[
                'data'  => $form2
            ]);
        }

        if(is_array($form3))
        {
            return $this->forward('AppBundle:TutoForm:formView',[
                'data'  => $form3
            ]);
        }

        if(is_array($form6))
        {
            return $this->forward('AppBundle:TutoForm:formView',[
                'data'  => $form6
            ]);
        }

        if(is_array($form8))
        {
            return $this->forward('AppBundle:TutoForm:formView',[
                'data'  => $form8
            ]);
        }

        return $this->render('HolluxBundle::Tutos/'.$type.'/enform.html.twig', [
            'form1' => $form1->createview(),
            'form2' => $form2->createview(),
            'form3' => $form3->createview(),
            'form6' => $form6->createview(),
            'form8' => $form8->createview(),
        ]);
    }

    /**
     * @Route("/formView/{data}", name="formView")
     */
    public function formViewAction($data = null)
    {

        if(null == $data) {
            echo'error data null';exit; }


        return $this->render('HolluxBundle:Tutos:formview.html.twig', ['data' => $data]);
    }

    /**
     * @Route("/form/{int}", name="formx")
     * requirements={"type" = "soft|hard"})
     */
    public function formxAction($int = null, Request $request)
    {
        $type = $this->get('GetTypeOfTuto')->getTypeOfTuto();

        if(null == $int) {
            echo'Need int of form';exit; }

        //TODO : trouver comment tester si un service exist
        $form = $this->get('form.form'.$int)->handleRequest($request);

        if(is_array($form))
        {
            return $this->forward('HolluxBundle:Tutos:formView',[
                'data'  => $form
            ]);
        }

        //FORM DIFFERENT POUR LES COLLECTIONS
        if($int = 8)
        {
            return $this->render('HolluxBundle::Tutos/'.$type.'/formx2.html.twig', ['form' => $form->createview()]);
        }

        return $this->render('HolluxBundle::Tutos/'.$type.'/formx.html.twig', ['form' => $form->createview()]);
        Return ['form' => $form->createview()];
    }

    /**
     * @Route("/bases", name="indexBase")
     * @Template
     */
    public function indexBaseAction(Request $request)
    {


        return[];
    }



}