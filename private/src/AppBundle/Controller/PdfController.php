<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PdfController extends Controller
{
	/**
	 * @Route("/viewpdf/{name}", name="viewpdf")
     * @Template
	 */
	public function viewpdfAction($name)
	{

        return ['pdfName' => $name];
	}
}
