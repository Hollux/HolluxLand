<?php

namespace MediaBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MediaBundle\Form;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use MediaBundle\Entity\SuperMedia as Media;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route(service="mediabundle.mediacontroller")
 */
class MediaController
{
    protected $form;
    protected $brochureUploader;
    protected $targetDir;
    protected $em;
    protected $router;
    protected $mediaClassName;
    protected $mediaType;

    public function __construct(FormFactoryInterface $formFactory,
                                $brochureUploader, $targetDir, EntityManager $em,
                                $router, $mediaClassName, $mediaType)
    {
        $this->formFactory = $formFactory;
        $this->brochureUploader = $brochureUploader;
        $this->targetDir = $targetDir;
        $this->em = $em;
        $this->router = $router;
        $this->mediaClassName = $mediaClassName;
        $this->mediaType = $mediaType;
    }

    /**
     * @Route("/createmedia", name="createmedia")
     * @Template
     */
    public function createmediaAction(Request $request)
    {
        $message = [];
        $media = new $this->mediaClassName;
        $form = $this->formFactory->create($this->mediaType, $media);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $message = ['success' => false, 'message' => 'Media invalid'];
            if ($form->isValid()) {
                $file = $media->getFile();
                $fileName = $this->brochureUploader->upload($file);

                $media->setFile($fileName);
                $media->setFilename($file->getClientOriginalName());

                $this->em->persist($media);
                $this->em->flush();

                $message = ['success' => true, 'message' => 'Media envoyé avec succés.'];
            }
        }

        return ['form' => $form->createview(), 'message' => $message];
    }

    /**
     * @Route("/datamedia", name="datamedia")
     * @Template
     */
    public function datamediaAction()
    {
        return [];
    }

    /**
     * @Route("/paginatemedia", name="paginatemedia")
     */
    public function paginateMediaAction(Request $request)
    {
        $length     = $request->get('length');
        $length     = $length && ($length != -1) ? $length : 0;
        $start      = $request->get('start');
        $start      = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;
        $search     = $request->get('search');
        $filters    = ['query' => @$search['value']];
        $medias     = $this->em->getRepository('MediaBundle:Media')->search($filters, $start, $length);
        $output     = ['data' => [], 'recordsFiltered' => count($medias), 'recordsTotal' => count($medias)];
        foreach ($medias as $media) {
            $output['data'][] = [
                'id' => $media->getId(), 
                'file' => '<img src="'.$this->generateUrl('getMedia',['url' => $media->getFile()]).'">',
                'filename' => $media->getFilename(),
               /* 'url' => '<img src="'.$this->generateUrl('getMedia',['url' => $media->getFile()]).'">',*/
                'createdat' => $media->getCreatedat()->format('Y-m-d'),];
        }

        /*$json = new JsonResponse();
        return $json->setData(['Content-Type' => 'application/json']);*/
        
        return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
    }

    //surcharge redirectToRoute avec service router
    protected function generateUrl($route, $parameters = [], $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->router->generate($route, $parameters, $referenceType);
    }
}
