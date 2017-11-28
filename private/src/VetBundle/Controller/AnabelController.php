<?php
namespace VetBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/vet/anabel")
 */
class AnabelController extends Controller
{
    /**
     * @Route("/", name="anabel_home")
     * @Template
     */
    public function anabelhomeAction()
    {
        return [];
    }

    /**
     * @Route("/create", name="anabel_create")
     * @Template
     */
    public function anabelcreateAction()
    {
        $anabel = $this->get('anabelHandler')->createAnabel();

        return $this->redirectToRoute('anabel_edit', ['idAnabel' => $anabel->getId()]);
    }

    /**
     * @Route("/edit/{idAnabel}", name="anabel_edit")
     * @Template
     * requirements={"idAnabel" = "\d+"})
     */
    public function anabeleditAction($idAnabel, Request $request)
    {
        $formAnabel = $this->get('anabelHandler')->formAnabelById($idAnabel, $request);
        $sections = $this->get('anabelHandler')->AnabelSections();

        return ['formanabel' => $formAnabel->createview(), 'sections' => $sections];
    }


}