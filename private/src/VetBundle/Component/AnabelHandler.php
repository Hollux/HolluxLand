<?php
namespace VetBundle\Component;

use Doctrine\ORM\EntityManager;
use VetBundle\Entity\Anabel;
use VetBundle\Form\AnabelType;
use Symfony\Component\Form\FormFactoryInterface;

class AnabelHandler
{
    private $em;
    private $formFactory;

    public function __construct(Entitymanager $em, FormFactoryInterface $formFactory)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
    }

    ///////////////
    //  GETTER  //
    //////////////

    public function getAnabelById($anabelId)
    {
        $anabel = $this->em->getRepository('VetBundle:Anabel')->findOneById($anabelId);

        return $anabel;
    }


    ///////////////
    //  SETTER  //
    //////////////

    public function CreateAnabel()
    {
        $anabel = New Anabel();

        $this->em->persist($anabel);
        $this->em->flush();

        return $anabel;
    }


    ///////////////
    //   FORM   //
    //////////////

    public function FormAnabel(Anabel $anabel, $request)
    {
        // probleme avec la class formFactory
        // $formAnabel = $this->formFactory->formFactoryByObject($anabel, 'AnabelType', $request);
        $formAnabel = $this->formDEBUG($anabel, $request);

        return $formAnabel;
    }

    public function formDEBUG($objet, $request)
    {
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

    public function formAnabelById($anabelId, $request)
    {
        $anabel = $this->getAnabelById($anabelId);

        $formAnabel = $this->FormAnabel($anabel, $request);

        return $formAnabel;
    }


    //////////////////////
    //  FONCTIONNEMENT  //
    /////////////////////

    public function AnabelSections()
    {
        //TODO Revoir nom et organisation du array
        $sections = [
            "0" => "Sélection de l'éleveur",
            "1" => 'Analyse facturée à',
            "2" => "Caractéristiques de l'animal",
            "3" => "Informations complémentaires",
            "4" => "Cochez les analyses à saisir"
        ];

        return $sections;
    }










}