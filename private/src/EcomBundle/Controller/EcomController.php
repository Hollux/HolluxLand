<?php
namespace EcomBundle\Controller;

use EcomBundle\ListHelper\ProduitElement;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EcomController extends Controller
{
    /**
     * @Route("/ecomindex", name="ecomindex")
     * @Template
     */
    public function ecomindexAction()
    {
        $em = $this->getDoctrine()->getManager(); // ==
        //$em = $this->get('doctrine.orm.entity_manager');
        $produitRepository = $em->getRepository("EcomBundle:Produit");
        $listProduit = $produitRepository->findAll();

        $listProduit = $this->get('listhelper.component.listhelper_factory')
            ->create(ProduitElement::class, $produitRepository->createQueryBuilder('p'));

        return ['listproduit' => $listProduit->createView()];
    }

}