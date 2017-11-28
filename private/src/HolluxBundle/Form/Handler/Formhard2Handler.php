<?php
namespace HolluxBundle\Form\Handler;

use HolluxBundle\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class Formhard2Handler
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

        $form2 = $this->formFactory->create(Form\Form2Type::class);
        $form2->handleRequest($request);

        if($form2->isSubmitted() && $form2->isValid())
        {
            $request->getSession()->getFlashBag()->add('success', 'Form Correctly Submited');

            return $form2->getData();
        }

        return $form2;
    }
}