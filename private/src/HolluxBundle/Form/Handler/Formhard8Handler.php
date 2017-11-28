<?php
namespace HolluxBundle\Form\Handler;

use HolluxBundle\Entity\Magasin2;
use HolluxBundle\Entity\Produit3;
use HolluxBundle\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;

class Formhard8Handler
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
        $produit3 = new Produit3();

       /* $mag1 = new Magasin2();
        $mag1->setName('mag1');
        $produit3->getMagasins()->add($mag1);
        $mag2 = new Magasin2();
        $mag2->setName('mag2');
        $produit3->getMagasins()->add($mag2);*/

        $form8 = $this->formFactory->create(Form\Form8Type::class, $produit3);
        $form8->handleRequest($request);

        if($form8->isSubmitted() && $form8->isValid())
        {
            $request->getSession()->getFlashBag()->add('success', 'Form Correctly Submited');
            //Probleme , entity renvoi un objet et non un array
            dump($form8->getData());exit;
            return $form8->getData();
        }

        return $form8;
    }
}