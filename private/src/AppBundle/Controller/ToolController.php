<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ToolController extends Controller
{
    /**
     * @Route("/img/{type}/{width}/{height}/{url}",
     * name="resizeimage",
     * requirements={"url"=".+", "type" = "fill|crop", "width": "\d+", "height": "\d+" })
     */
    public function getImageAction(Request $request, $type, $width, $height, $url)
    {
        //recupération des services
        $resizeImage = $this->get('app.service.ResizeImage');
        $uploadPath    = $this->getParameter('upload_directory');

        // Find file by uri
        $file = $this->get('appbundle.service.uritofile')->find($url);

        //$file = new File($imageFile);
        // Set vars
        $etag = sha1_file($file->getPathname()).$width.$height;
        $thumbFilename = $uploadPath .'/thumbs/'.md5($type . $width. $height. $url).'.jpg';

        // Calcul de la nouvelle image resize
        $resizeImage->resize_image(
            $file->getPathname(),
            $width,
            $height,
            $thumbFilename,
            $type == 'crop'
        );

        // Create Response with standard http header for caching file
        $response = new BinaryFileResponse($thumbFilename);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_INLINE, $url)
            ->setEtag($etag)
            ->setMaxAge(604800)
            ->setLastModified((new \DateTime())->setTimestamp($file->getMTime()))
            ->setExpires((new \DateTime())->modify('+604800 seconds'))

        ;
        $response->isNotModified($request);

        return $response;
    }

    /**
     * @Route("/media/{url}",
     * name="getMedia",
     * requirements={"url"=".+"})
     */
    public function getMediaAction($url = "")
    {
        // recupération du service
        $getMedia = $this->get('app.service.getmedia');

        $file = $getMedia->getFileByName($url);

        if ($file instanceof File && $file->isFile()) {
            $response = new Response();
            $response->setContent(file_get_contents($file->getPath() . '/'. $file->getFilename()));
            $response->headers->set('Content-Type', 'application/force-download'); // modification du content-type pour forcer le téléchargement (sinon le navigateur internet essaie d'afficher le document)
            $response->headers->set('Content-disposition', 'filename='.$url);
            // cache for 3600 seconds
            $response->setSharedMaxAge(3600);

            // (optional) set a custom Cache-Control directive
            $response->headers->addCacheControlDirective('must-revalidate', true);

            return $response;
        } else {
            throw $this->createNotFoundException(
                'Aucun fichier téléchargeable '
            );
        }
    }

}