<?php
namespace ListBuilderBundle\Controller;

use ListBuilderBundle\Entity\List_Figurine;
use ListBuilderBundle\Entity\Liste;
use ListBuilderBundle\Form\ListBuilderType;
use ListBuilderBundle\Form\SelectFactionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/listbuilder")
 */
class ListBuilderController extends Controller
{
    private $handler;

    /**
     * Override method to call #containerInitialized method when container set.
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        parent::setContainer($container);

        $this->handler = $this->get('listbuilder.component.listbuilder.listbuilder');
    }


    /**
     * @Route("/", name="listbuilder")
     * @Template
     */
    public function listbuilderAction()
    {
        $lists = $this->handler->getLists();

        return ['lists' => $lists];
    }

    /**
     * @Route("/create", name="listbuilder_create")
     * @Template
     */
    public function createAction()
    {
        $newList = $this->handler->createList();

        return $this->redirectToRoute('listBuilder_Edit', ['idlist' => $newList->getId()]);
    }

    /**
     * @Route("/list/{idlist}", name="listbuilder_list")
     * @Template
     * requirements={"idlist" = "\d+"})
     */
    public function listAction($idlist)
    {
        $list = $this->handler->listAction($idlist);

        return ['list' => $list];
    }

    /**
     * @Route("/edit/{idlist}", name="listbuilder_edit")
     * @Template
     * requirements={"idlist" = "\d+"})
     */
    public function editAction($idlist, Request $request)
    {
        // return la list
        $list = $this->handler->getList($idlist);
        //return le form List
        $form = $this->handler->formList($list, $request);
        //return le form choix des factions
        $formfaction = $this->get('listbuilder.component.listbuilder.ListBuilderFactionchoice')->handleRequest($request);

        return ['formFaction' => $formfaction->createview(), 'form' => $form->createview(), 'list' => $list];
    }

    /**
     * @Route("/factionChoice", name="listbuilder_factionChoice")
     * @Template
     */
    public function factionChoiceAction(Request $request)
    {
        $service = $this->get('listbuilder.component.listbuilder.ListBuilderFactionchoice');
        $form = $service->handleRequest($request);
        $figurines = $service->getFig($form);

        return ['figurines' => $figurines];
    }

    /**
     * @Route("/addFigurineToList/{idList}/{idFig}", name="listbuilder_addFigurineToList")
     * requirements={"idList" = "\d+", "idFig" = "\d+"})
     */
    public function addFigurineToListAction($idList, $idFig)
    {
        // creation de la liste
        $this->handler->addFigurineToList($idList, $idFig);

        return $this->redirectToRoute('listbuilder_figurineview', ['idfig' => $idList]);
    }


//TODO REVOIR
    /**
     * @Route("/figurineview/{idfig}", name="listbuilder_figurineview")
     * @Template
     * requirements={"idfig" = "\d+"})
     */
    public function figurineviewAction($idfig)
    {
        $list = $this->handler->getList($idfig);

        return ['list' => $list];
    }

    /**
     * @Route("/figurineModal/{idlistfig}", name="listbuilder_modallist_fig")
     * @Template
     * requirements={"$idlistfig" = "\d+"})
     */
    public function modallist_figAction($idlistfig, Request $request)
    {
        $list_Fig = $this->handler->getList_Fig($idlistfig);
        $formList_Fig = $this->handler->formList_Figurine($list_Fig, $request);
        $fig = $list_Fig->getFigurine();

        return ['figulistform' => $formList_Fig->createview(), 'fig' => $fig];
    }

    /**
     * @Route("/deletfigurine/{idlistfig}", name="listbuilder_deletlist_fig")
     * @Template
     * requirements={"$idlistfig" = "\d+"})
     */
    public function deletfigurineAction($idlistfig)
    {
        //TODO REFAIRE
        $list_fig = $this->handler->getListFig($idlistfig);
        $idList = $list_fig->getList();

        $this->handler->removeFigurine($list_fig);

        return $this->redirectToRoute('listBuilderEdit', ['id' => $idList]);
    }









    /**
     * @Route("/formlist", name="formList")
     * @Template
     */
    /*public function formListAction(Request $request)
    {
        $data = $this->get('session')->get('ListBuilderList');
        $listBuilderList = new Liste($data);

        $form = $this->handler->handleRequest($listBuilderList, $request);

        return ['form' => $form->createview()];
    }*/

}