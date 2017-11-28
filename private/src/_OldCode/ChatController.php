<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\MessageChatType;
use AppBundle\Entity\MessageChat;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ChatController extends Controller
{

	/**
	 * @Route("/chat", name="chat")
	 * @Template
	 */
	public function chatAction(Request $request)
	{
		if(is_string($author = $this->container->get('security.token_storage')->getToken()->getUser())) {
			$request->getSession()->getFlashBag()->add('error', 'vous devez vous connecter pour acceder au chat');

			return $this->redirectToRoute('home');
		}

		return [];
	}


	/**
	 * @Route("/ajaxMessageChat", name="ajaxMessageChat")
	 *

	 */
	public function ajaxMessageChatAction(Request $request)
	{
		$response = new JsonResponse();
		$data     = ['success' => [], 'error' => ''];
		switch($request->get('type')) {
			// MISE A JOUR MESSAGES BASE
			case 'maj':
				$timestamp    = $request->get('data');
				$messagesChat = $this->getDoctrine()->getRepository('AppBundle:MessageChat')->findLast(20);
				// inverse le find
				for($i = count($messagesChat); $i > 0; $i--) {
					$messageChat       = $messagesChat[$i - 1];
					$data['success'][] = $messageChat->tojson();
				}
				// find normal
				//foreach ($messagesChat as $messageChat) {
				//    $data['success'][] = $messageChat->tojson();
				//}
				break;
			// POST
			case 'post':
				$messageChat = new MessageChat();
				$author      = $this->container->get('security.token_storage')->getToken()->getUser();
				$number      = preg_replace('`[^0-9]`', '', $request->get('data'));
				//findByName ressort un array d'objet
				$bots = $this->getDoctrine()->getRepository('AppBundle:User')->findByName('Bot');
				//on ouvre l'array
				foreach($bots as $bot) {
					$bot = $bot;
				}
				//OBLIGE LE LOG
				if(!is_string($author)) {
					// SWITCH DES DATA DES POSTS
					// REVOIR AVEC UN SIMPLE IF ET '' DOIT VERIFIER STRING VIDE ou rempli d'espace
					switch($request->get('data')) {
						case '':
							break;
						default:
							if(substr($request->get('data'), 0, 1) == '/') {
								// LES DIFFERENTES COMMANDES
								if(preg_match('#^\/dice [0-9]+$#', $request->get('data'))) {
									$random = rand(0, $number);
									$messageChat->setContent($author->getName().' a lancé un d'.$number.' Résultat : '.
										$random.'.');
									//echo($request->get('data'));exit;
									$messageChat->setUser($bot);
									$messageChat->setCreatedAt(new \DateTime());
									$em = $this->getDoctrine()->getManager();
									$em->persist($messageChat);
									$em->flush();
									$data['success'][] = $messageChat->tojson();
								}
								else if(preg_match('#^\/back [0-9]+$#', $request->get('data'))) {
									// pour le moment. Remonte et ressort les 100 derniers post dans le bon ordre MAIS ne rajoute pas ceux 
									// présent dans le chat.
									if($number > 101) {
										$number = 100;
									}
									//$number>101?$number=100;
									$timestamp    = $request->get('data');
									$messagesChat =
										$this->getDoctrine()->getRepository('AppBundle:MessageChat')->findLast($number);
									// inverse le find
									for($i = count($messagesChat); $i > 0; $i--) {
										$messageChat       = $messagesChat[$i - 1];
										$data['success'][] = $messageChat->tojson();
									}
								}
								else {
									$data['error'][] = 'commande non reconnu';
								}
							}
							else {
								$messageChat->setContent($request->get('data'));
								//echo($request->get('data'));exit;
								$messageChat->setUser($author);
								$messageChat->setCreatedAt(new \DateTime());
								$em = $this->getDoctrine()->getManager();
								$em->persist($messageChat);
								$em->flush();
								$data['success'][] = $messageChat->tojson();
							}
							break;
					}
					//FIN SWITCH DATA DU POST
				}
				else {
					//SI !$AUTHOR
					$data['error'][] = 'Pas loguer';
				}
				break;
			// DEFAULT TYPE
			default:
				$data['error'][] = 'type pas bon';
				break;
		}
		$response->setData($data);

		return $response;
	}


}

