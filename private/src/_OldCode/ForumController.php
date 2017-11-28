<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Forum;
use AppBundle\Form\ForumType;
use AppBundle\Form\Handler\ForumHandler;

class ForumController extends Controller
{
	protected $forumHandler;
	// handler et un service
	// GET REFERER
	//$url = $request->headers->get('referer');
	/**
	 * @Route("/forum/{id}",
	 * name="forum",
	 * requirements={"id" = "\w+"}, defaults={"id" = ""})
	 */
	public function indexAction($id, Request $request)
	{
		$this->forumHandler = $this->container->get('appbundle.form.handler.forumhandler');
		//secu hors ligne
		if(is_string($author = $this->container->get('security.token_storage')->getToken()->getUser())) {
			$request->getSession()->getFlashBag()->add('error', 'vous devez vous connecter pour acceder au forum');

			return $this->redirectToRoute('home');
		}
		// POSTS
		$em         = $this->getDoctrine()->getManager();
		$forumPosts = $em->getRepository('AppBundle:Forum')->getForumPosts($id);
		// FORM
		$options = ['author'     => $this->container->get('security.token_storage')->getToken()->getUser(), 'id' => $id,
		            'forumPosts' => $forumPosts];
		if($this->forumHandler->process(null, $options)->isSuccess()) {
			$request->getSession()->getFlashBag()->add('success', 'post saves correctly');

			return $this->redirect($this->generateUrl('forum', ['id' => $id]));
		}

		// /FORM
		return $this->render('AppBundle:Forum:forumIndex.html.twig',
			['form' => $this->forumHandler->getForm()->createView(), 'posts' => $forumPosts]);
	}
}

