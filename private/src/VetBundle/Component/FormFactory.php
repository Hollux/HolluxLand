<?php
namespace VetBundle\Component;


use Symfony\Component\Form\FormFactoryInterface;
use VetBundle\Form\AnabelType;

class FormFactory
{
    private $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formfactory = $formFactory;
    }

    public function formFactoryByObject($objet, $stringType, $request)
    {
        dump(AnabelType::class, $objet);
        //TODO mettre le $string
        $form = $this->formFactory->create(AnabelType::class, $objet);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->em->persist($objet);
                $this->em->flush();
            } else {
                $request->getSession()->getFlashBag()->add('error', "formBuilder Create invalid");
            }
        }

        return $form;
    }

}