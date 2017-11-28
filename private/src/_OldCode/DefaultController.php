<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

class DefaultController extends Controller
{
	/**
	 * @Route("/appHome", name="homepage")
	 */
	public function indexAction(Request $request)
	{
		// replace this example code with whatever you need
		return $this->render('default/index.html.twig',
			['base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),]);
	}

	/**
	 * @Route("/media/{url}",
	 * name="getMedia",
	 * requirements={"url"=".+"})
	 */
	public function getMediaAction($url)
	{
		// recupération du service
		$getMedia = $this->get('app.service.getmedia');

		$file = $getMedia->getFileByName($url);

		if ($file instanceof File && $file->isFile()) {
			$response = new Response();
			$response->setContent(file_get_contents($file->getPath() . '/'. $file->getFilename()));
			$response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
			$response->headers->set('Content-disposition', 'filename='.$url);

			return $response;
		} else {
			throw $this->createNotFoundException(
				'Aucun fichier téléchargeable '
			);
		}

	}
}
