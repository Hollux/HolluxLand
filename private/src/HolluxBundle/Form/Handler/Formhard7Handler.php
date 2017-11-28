<?php
namespace HolluxBundle\Form\Handler;

use HolluxBundle\Entity\Produit2;
use HolluxBundle\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class Formhard7Handler
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
        $produit2 = new Produit2();
        $form7 = $this->formFactory->create(Form\Form7Type::class, $produit2);
        $form7->handleRequest($request);

        if($form7->isSubmitted() && $form7->isValid())
        {
            $request->getSession()->getFlashBag()->add('success', 'Form Correctly Submited');
            //Probleme , entity renvoi un objet et non un array
            dump($form7->getData());exit;
            return $form7->getData();
        }

        return $form7;
    }
}