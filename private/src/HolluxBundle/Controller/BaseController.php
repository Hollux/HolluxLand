<?php

namespace HolluxBundle\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Request;

use HolluxBundle\Form;

use Symfony\Component\Form\FormFactoryInterface;

use AppBundle\Component\Mailer\Message;

use AppBundle\Component\Mailer\MyCustomMailer;



class BaseController extends Controller

{

    /**

     * @Route("/", name="home")

     * @Template

     */

    public function indexAction()

    {

        return [];

    }

    /**
     * @Route("/testimg", name="testimg")
     * @Template
     */
    public function testimgAction()
    {

        return [];
    }



    /**

     * @Route("/competences", name="competences")

     * @Template

     */

    public function competencesAction(Request $request)

    {

        return[];

    }



    /**

     * @Route("/CV", name="CV")

     * @Template

     */

    public function CVAction()

    {



        return [];

    }



    /**

     * @Route("/infoPerso", name="infoPerso")

     * @Template

     */

    public function infoPersoAction()

    {

        return [];

    }



    /**

     * @Route("/mentionslegales", name="mentionslegales")

     * @Template

     */

    public function mentionslegalesAction()

    {

        return [];

    }



    /**

     * @Route("/mecontacter", name="meContacter")

     * @Template

     */

    public function meContacterAction(Request $request)

    {

        $form = $this->createForm(Form\MeContacterType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {

                $body = $this->get('templating')->render('Mail/mecontacterMail.html.twig',

                    ['content' => $form->get('content')->getData(), 'email' => $form->get('email')->getData(),

                        'time' => date("Y-m-d H:i:s")]);

                $this->get('appbundle.component.mailer')->send(new Message(

                        'Me Contacter Hollux.fr',

                        'hollux@hollux.fr',

                        ['holluxpanda@gmail.com', 'hollux@hollux.fr'],

                        $body)

                );

                $request->getSession()->getFlashBag()->add('success', "Message envoyé avec succès");

            }

        }



        return ['form' => $form->createview()];

    }



    /**

     * @Route("/poney", name="poney")

     * @Template

     */

    public function poneyAction()

    {

        return [];

    }

}