<?php
namespace HolluxBundle\Form\Handler;

use HolluxBundle\Entity\Produit1;
use HolluxBundle\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class Formsoft3Handler
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

        $produit = new Produit1();
        $form3 = $this->formFactory->create(Form\Form3Type::class, $produit);
        $form3->handleRequest($request);



        if($form3->isSubmitted() && $form3->isValid())
        {
            $request->getSession()->getFlashBag()->add('success', 'Form Correctly Submited');
            //Probleme , entity renvoi un objet et non un array
            dump($form3->getData());exit;

            return $form3->getData();
        }

        return $form3;
    }
}