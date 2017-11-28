<?php
namespace NewsBundle\Controller\Handler;

use Doctrine\ORM\EntityManagerInterface;
use NewsBundle\Entity\News;
use NewsBundle\Form\NewsType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;

class NewsHandler
{
    protected $em;
    protected $formFactory;
    protected $router;

    public function __construct(EntityManagerInterface $em,  FormFactoryInterface $formFactory, RouterInterface $router)
    {
        $this->em = $em;
        $this->formFactory  = $formFactory;
        $this->router = $router;
    }

    public function CreateEditAction($id, $request)
    {
        $new = null;
        //verif si ID
        if($id) {
            $new = $this->em->getRepository('NewsBundle:News')->findOneById($id);
        }
        if(!$new){
            $new = new News();
        }

        //creation Form
        $form = $this->formFactory->create(NewsType::class, $new);
        $form->handleRequest($request);

        //Submit Form
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->em->persist($new);
                $this->em->flush();

                $request->getSession()->getFlashBag()->add('success', "News créé avec succès");

                return $this->router->generate('newsCreateEdit', ['id' => $new->getId()]);
            } else {
                $request->getSession()->getFlashBag()->add('error', "Une erreur est survenu, contenu non valide");
            }
        }

        return $form;
    }
}