<?php
namespace Admin\NavBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Admin\NavBundle\Form;
use Admin\NavBundle\Entity\Nav;


class NavController extends Controller
{
    /**
     * @Route("/", name="nav")
     * @Template
     */
    public function navAction()
    {
        $em = $this->getDoctrine()->getManager();
        $navs = $em->getRepository('AdminNavBundle:Nav')->findByOrder();

        return ['navs' => $navs];
    }

    /**
     * @Route("/create/{id}", name="navcreate",
     * requirements={"id" = "\w+"})
     * @Template
     */
    public function navcreateAction($id = null, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $navs = $em->getRepository('AdminNavBundle:Nav')->findAll();
        if($id !== null)
        {
            $em = $this->getDoctrine()->getManager();
            $nav = $em->getRepository('AdminNavBundle:Nav')->findOneById($id);
        } else {
            $nav = new Nav();
        }
        $form = $this->createForm(Form\NavcreateType::class, $nav);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                foreach($navs as $nave){
                    if($nave->getOrdre() == $nav->getOrdre()){
                        if($nave->getId() !== $nav->getId())
                            $this->get('admin.navbundle.ordrenav')->OrdrePlus($navs, $nav->getOrdre());
                    }
                }
                $em->persist($nav);
                $em->flush();

                $request->getSession()->getFlashBag()->add('success', "Nav créé avec succès");
            } else {
                $request->getSession()->getFlashBag()->add('error', "Une erreur est survenu, contenu non valide");
            }
        }

        return ['form' => $form->createview()];
    }

    /**
     * @Route("/edit/{id}", name="navedit")
     * @Template
     * requirements={"id" = "\w+"})
     */
    public function naveditAction($id)
    {
        //TODO find nav by id, form avec $nav;

        return [];
    }

    /**
     * @Route("/isVisible/{id}", name="navisVisible")
     * requirements={"id" = "\w+"})
     */
    public function navisVisibleAction($id, Request $request)
    {
        //TODO find nav by id, edit sql direct, if isVisible = 0 alors 1 ou 1 alors 0;
        $em = $this->getDoctrine()->getManager();
        $nav = $em->getRepository('AdminNavBundle:Nav')->findOneById($id);
        if (null !== $nav) {
            $nav->getIsvisible() == 1 ? $nav->setIsvisible(0) : $nav->setIsvisible(1);
            $em->persist($nav);
            $em->flush();
        } else {
            $request->getSession()->getFlashBag()->add('error', "Une erreur est survenu");
        }


        return $this->redirectToRoute('nav');
    }

    /**
     * @Route("/ordre/{action}/{id}", name="navOrdre",
     * requirements={"id" = "\w+", "action": "[a-zA-Z0-9-]+"})
     * @Template
     */
    public function navOrdreAction($id, $action)
    {
        $em = $this->getDoctrine()->getManager();
        $navs = $em->getRepository('AdminNavBundle:Nav')->findAll();
        foreach($navs as $nav){
            if($nav->getId() == $id) {
                if($action == 'plus') {
                    $this->get('admin.navbundle.ordrenav')->OrdrePlus($navs, $nav->getOrdre());
                } else if($action == 'moins') {
                    $this->get('admin.navbundle.ordrenav')->OrdreMoins($navs, $nav->getOrdre());
                }
            }
        }

        return $this->redirectToRoute('nav');
    }
}