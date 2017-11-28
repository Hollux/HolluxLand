<?php
namespace ListBuilderBundle\Component\ListBuilder;

use Doctrine\ORM\EntityManager;
use ListBuilderBundle\Entity\Liste;
use ListBuilderBundle\Form\FigurineType;
use ListBuilderBundle\Form\ListBuilderType;
use ListBuilderBundle\Form\SelectFactionType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class ListBuilderFactionchoice
{
    private $em;
    private $formFactory;

    public function __construct(Entitymanager $em,
                                FormFactoryInterface $formFactory)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
    }

    // form
    public function handleRequest(Request $request)
    {
        $form = $this->formFactory->create(SelectFactionType::class, null ,
            ['entity_manager' => $this->em]);
        $form->handleRequest($request);

        return $form;
    }

    //get
    public function getFig($form)
    {
        if($form->isSubmitted()) {
            if ($form->isValid()) {
                return $this->em->getRepository('ListBuilderBundle:Figurine')->findByListbuilderfaction($form->get('listbuilderfaction')->getData());
            }
        }

        return [];
    }

}