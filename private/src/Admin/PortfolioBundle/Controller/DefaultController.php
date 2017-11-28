<?php
namespace Admin\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Admin\PortfolioBundle\Form;
use Symfony\Component\HttpFoundation\Request;
use Admin\PortfolioBundle\Entity\Portfolio;
use Admin\PortfolioBundle\Entity\TypePortfolio;

class DefaultController extends Controller
{
    /**
     * @Route("/createportfolio", name="createportfolio")
     * @Template
     */
    public function createportfolioAction(Request $request)
    {
        $portfolio = new Portfolio();

        $form = $this->createForm(Form\PortfolioType::class, $portfolio);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $mediaV = $form->get('media')->getData();
                //echo'admincontroller';exit;

                $em = $this->getDoctrine()->getManager();
                // var_dump($form->get('content')->getData());exit;
                $em->persist($portfolio);
                $em->flush();

                $request->getSession()->getFlashBag()->add('success', "portfolio créé avec succé");
            }
            else {

                $request->getSession()->getFlashBag()->add('error', "un probleme est survenu");
            }
        }


        return ['form' => $form->createview()];
    }

    /**
     * @Route("/createtypeportfolio", name="createtypeportfolio")
     * @Template
     */
    public function createtypeportfolioAction(Request $request)
    {
        $typeportfolio = new TypePortfolio();
        $form = $this->createForm(Form\TypePortfolioType::class, $typeportfolio);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();
                $em->persist($typeportfolio);
                $em->flush();

                $request->getSession()->getFlashBag()->add('success', "Type envoyé avec succés");

            } else {
                $request->getSession()->getFlashBag()->add('error', "un probleme est survenu");
            }
        }

        return ['form' => $form->createview()];
    }

}
