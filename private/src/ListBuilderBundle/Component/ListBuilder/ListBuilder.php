<?php
namespace ListBuilderBundle\Component\ListBuilder;

use Doctrine\ORM\EntityManager;
use ListBuilderBundle\Entity\Figurine;
use ListBuilderBundle\Entity\Option;
use ListBuilderBundle\Entity\List_Figurine;
use ListBuilderBundle\Entity\Liste;
use ListBuilderBundle\Form\ListBuilderType;
use ListBuilderBundle\Form\ListFiguOptionsType;
use ListBuilderBundle\Form\SelectFactionType;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class ListBuilder implements ListBuilderInterface
{
    private $em;
    private $formFactory;
    private $session;
    private $tokenStorage;

    public function __construct(Entitymanager $em,
                                FormFactoryInterface $formFactory,
                                SessionInterface $session,
                                TokenStorage $tokenStorage)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->session = $session;
        $this->tokenStorage = $tokenStorage;
    }

    //GETTER
    public function getList($idList)
    {
        $List = $this->em->getRepository('ListBuilderBundle:Liste')->findOneById($idList);

        return $List;
    }

    public function getLists()
    {
        $List = $this->em->getRepository('ListBuilderBundle:Liste')->findAll();

        return $List;
    }

    public function getList_Fig($idFigList)
    {
        $list_fig = $this->em->getRepository('ListBuilderBundle:List_Figurine')->findOneById($idFigList);

        if(!isset($list_fig))
        {
            throw new \Exception('Id spécifié inéxistant!');
        }

        return $list_fig;
    }

    public function getFigurine($idFigurine)
    {
        $figurine = $this->em->getRepository('ListBuilderBundle:Figurine')->findOneById($idFigurine);

        if(!isset($figurine))
        {
            throw new \Exception('Id spécifié inéxistant!');
        }

        return $figurine;
    }

    public function getOption($idOption)
    {
        $option = $this->em->getRepository('ListBuilderBundle:Option')->findOneById($idOption);

        if(!isset($option))
        {
            throw new \Exception('Id spécifié inéxistant!');
        }

        return $option;
    }

    //SETTER
    public function createList()
    {
        $list = new Liste();

        $this->em->persist($list);
        $this->em->flush();

        return $list;

    }

    public function createList_figurine()
    {
        $list_figurine = new List_Figurine();

        $this->em->persist($list_figurine);
        $this->em->flush();

        return $list_figurine;
    }

    public function setFigurine(List_Figurine $list_figurine, $figurine)
    {
        $list_figurine->setFigurine($figurine);

        $this->em->persist($list_figurine);
        $this->em->flush();

        return $list_figurine;
    }

    public function setList(List_Figurine $list_figurine, Liste $list)
    {
        $list_figurine->setList($list);

        $this->em->persist($list_figurine);
        $this->em->flush();

        return $list_figurine;
    }

    public function setList_Figurine(Liste $list, List_Figurine $list_figurine)
    {
        $list->addFigurine($list_figurine);

        $this->em->persist($list);
        $this->em->flush();

        return $list;
    }

    public function addOption(List_Figurine $list_figurine, Option $option)
    {
        $list_figurine->addOption($option);

        $this->em->persist($list_figurine);
        $this->em->flush();

        return $list_figurine;
    }

    public function addFigurineToList($idList, $idFig)
    {
        // objet liste
        $list = $this->getList($idList);
        // objet figurine
        $figurine = $this->getFigurine($idFig);
        // création objet list_fig
        $list_figurine = $this->createList_figurine();
        // lié list_fig à list
        $this->setList_Figurine($list, $list_figurine);
        // lié list_fig à fig
        $this->setFigurine($list_figurine, $figurine);

        $this->em->persist($list_figurine);
        $this->em->flush();

        //OU ?!
        /*
        $list->addFigurine($figurine);
        $this->em->persist($list);
        $this->em->flush();
        */
        return $list_figurine;
    }

    //remove
    public function removelist_Figurine(List_Figurine $list_figurine)
    {
        $this->em->remove($list_figurine);
        $this->em->flush();
    }

    //form
    public function formList(Liste $list, $request)
    {
        $form = $this->formFactory->create(ListBuilderType::class, $list);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->em->persist($list);
                $this->em->flush();
            } else {
                $request->getSession()->getFlashBag()->add('error', "formBuilder Create invalid");
            }
        }

        return $form;
    }

    public function formList_Figurine(List_Figurine $list_Figurine, $request)
    {
        $form = $this->formFactory->create(ListFiguOptionsType::class, $list_Figurine);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $this->em->persist($list_Figurine);
                $this->em->flush();
                // $request->getSession()->getFlashBag()->add('success', "Figurine correctement édité");
            } else {
                $request->getSession()->getFlashBag()->add('error', "formBuilder Create invalid");
            }
        }

        return $form;
    }


    //security
    //TODO ne pas faire sa, passer en VOTER
    public function verifAuthor(Liste $list)
    {
        $user = $this->tokenStorage->getToken()->getUser();

        if($user)
        {
            if($user->getName() == $list->getAuthor())
            {
                return true;
            } else  if($user->getRole() == 'ROLE_ADMIN'){

                return true;
            } else {
                throw new \Exception("Pas les droits sur cette liste");
            }
        } else {
            throw new \Exception('No User');
        }

        return false;
    }

    //action
    public function listAction($idList)
    {
        $list = $this->getList($idList);
        $user = $this->tokenStorage->getToken()->getUser();

        if($user->getName() == $list->getAuthor())
        {
           //TODO redirect to listbuilder_edit
        }

        return $list;
    }


}