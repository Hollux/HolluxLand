<?php
namespace HolluxBundle\Form\Handler;

use HolluxBundle\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class Formhard1Handler
{
    private $em;
    private $formFactory;

    public function __construct(Entitymanager $em,
                                FormFactoryInterface $formFactory)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
    }

    //form
    public function handleRequest(Request $request)
    {

        $form1 = $this->formFactory->create(Form\Form1Type::class);
        $form1->handleRequest($request);

        if($form1->isSubmitted() && $form1->isValid())
        {
            $request->getSession()->getFlashBag()->add('success', 'Form Correctly Submited');

            return $form1->getData();
        }

        return $form1;
    }
}