<?php
namespace AppBundle\Controller;

use AppBundle\Service\CreateURL;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;

class TestController
{
/*    private $createURL;
    private $formFactory;

    public function __construct(CreateURL $createURL, FormFactoryInterface $formFactory)
    {
        $this->createURL = $createURL;
        $this->formFactory = $formFactory;
    }*/

    /**
     * @Route("/createURL",
     * name="createURL")
     * @Template
     */
    public function createURLAction(Request $request)
    {
        $response = null;
        $form = $this->formFactory->create(Form\TestType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $response = $this->createURL->createUrl($form->get('text')->getData());
            }
        }

        return ['form' => $form->createView(), 'resp' => $response];
    }

    /**
     * @Route("/modalTest",
     * name="modalTest")
     * @Template
     */
    public function modalTestAction()
    {

        return [];
    }

    /**
     * @Route("/dragndrop",
     * name="dragndrop")
     * @Template
     */
    public function dragndropAction()
    {

        return [];
    }
}