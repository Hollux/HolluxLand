<?php
namespace AppBundle\Form\Handler;

use AppBundle\Entity\Jeux;
use AppBundle\Entity\Partie;
use AppBundle\Entity\Response;
use AppBundle\Form\JeuxType;
use AppBundle\Form\ResponseType;
use AppBundle\Entity\TokenJeux;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePassword;
use Symfony\Component\Security\Core\User\UserInterface;

class HolluxHandler
{

	protected $request;
	protected $form;
	protected $formFactory;
	protected $em;
	protected $options;

	public function __construct(RequestStack $requestStack, EntityManager $em, FormFactoryInterface $formFactory,
	                            TokenStorageInterface $tokenStorage)
	{
		$this->request      = $requestStack->getCurrentRequest();
		$this->em           = $em;
		$this->formFactory  = $formFactory;
		$this->tokenStorage = $tokenStorage;
	}

	public function base($stringJeux)
	{
		// récupère le user
		$author = $this->tokenStorage->getToken()->getUser();
		// récupère le jeux
		$responseRepository = $this->em->getRepository("AppBundle:Jeux");
		$jeux               = $responseRepository->findJeuxQuestionByName($stringJeux);
		// récupère le token
		$tokenJeux = $this->tokenJeuxFonction($author, $jeux);
		if($tokenJeux->getNbrQuestion() > 1) {
			return false;
		}
		else {
			return true;
		}
	}

	public function process($stringJeux)
	{
		$data = [];
		// récupère le user
		$author = $this->tokenStorage->getToken()->getUser();
		// récupère le jeux
		$jeuxRepository = $this->em->getRepository("AppBundle:Jeux");
		$jeux           = $jeuxRepository->findJeuxQuestionByName($stringJeux);
		// récupère le token
		$tokenJeux = $this->tokenJeuxFonction($author, $jeux);
		//verif si response existe
		$responseRepository = $this->em->getRepository("AppBundle:Response");
		//voir pour rajouter le user à la DQB
		$response = $responseRepository->findOneByTokenJeuxAndQuestion($tokenJeux);
		//creation du form
		foreach($jeux->getQuestion() as $question) {
			if($tokenJeux->getNbrQuestion() == $question->getNumber()) {
				/*if(count($question->getResponse()) == 0)
					$response = new Response();
				else 
					$response = $question->getResponse()->first();*/
				if($response) {
				}
				else {
					$response = new Response();
				}
				//ajoute tokenJeux à response pour le Form
				$response->setTokenJeux($tokenJeux);
				$response->setQuestion($question);
				//var_dump($response);
				$form = $this->formFactory->create(ResponseType::class, $response);
				break;
			}
		}
		// Je traite le post
		if($this->request->isMethod('POST')) {
			//initialise les données du form
			$form->handleRequest($this->request);
			//récupérer le champ
			$responseString = $form->get("response")->getData();
			//Question
			$questions = $jeux->getQuestion();
			foreach($questions as $quest) {
				if($quest->getNumber() == $tokenJeux->getNbrQuestion()) {
					$question = $quest;
					break;
				}
			}
			//Securite si il ne trouve pas de question
			if($question) {
			}
			else {
				$data = 'error question non trouve';

				return ['form' => $form, 'data' => $data];
			}
			//test levenstein pour la validitee
			$isValid = $this->validJeux($question, $responseString);
			if($question->getNumber() == $tokenJeux->getNbrQuestion()) {
				//sauvegarder les donnees
				//if reponse existe pas , on le créé
				if(!$response->getId()) {
					$response = $this->savPost($responseString, $isValid, $question, $tokenJeux, $jeux, $author);
				}
			}
			else {
				$data['post'] = 'error';
			}
			$form = $this->formFactory->create(ResponseType::class, $response);
		}
		//affichage si la réponse est bonne
		if($response->getId()) {
			$data['post'] = 'post OK';
			if($response->getIsValid() == 1) {
				$data[] = 'Bravo, Bonne réponse';
			}
			else {
				$data[] = 'faux ! mauvaise réponse';
			}
		}

		return ['form' => $form, 'data' => $data];
	}

	public function next($stringJeux)
	{
		// récupère le user
		$author = $this->tokenStorage->getToken()->getUser();
		// récupère le jeux
		$responseRepository = $this->em->getRepository("AppBundle:Jeux");
		$jeux               = $responseRepository->findJeuxQuestionByName($stringJeux);
		// récupère le token
		$tokenJeux = $this->tokenJeuxFonction($author, $jeux);
		//TODO SECURITY NE PAS PASSER AU SUIVANT SANS VERIF
		$tokenJeux->setNbrQuestion($tokenJeux->getNbrQuestion() + 1);
		$this->em->persist($tokenJeux);
		$this->em->flush();
	}

	public function tokenJeuxFonction(UserInterface $author, Jeux $jeux)
	{
		// cherche si un token correspondant au jeux existe
		$tokenRepository = $this->em->getRepository("AppBundle:TokenJeux");
		$tokenJeux       = $tokenRepository->findByAuthorGame($author, $jeux);
		//Si non tokenJeux reste vide et on le créer
		if(null == $tokenJeux) {
			$tokenJeux = $this->createToken($author, $jeux, $tokenJeux);
		}

		return $tokenJeux;
	}

	public function destroy($stringJeux)
	{
		// récupère le user
		$author = $this->tokenStorage->getToken()->getUser();
		// récupère le jeux
		$responseRepository = $this->em->getRepository("AppBundle:Jeux");
		$jeux               = $responseRepository->findJeuxQuestionByName($stringJeux);
		// récupère le token
		$tokenJeux = $this->tokenJeuxFonction($author, $jeux);
		$this->createToken($author, $jeux, $tokenJeux);
	}

	public function createToken($author, $jeux, $tokenJeux)
	{
		$tokenJeuxN = new TokenJeux();
		if(null != $tokenJeux) {
			$tokenJeuxN->setToken($tokenJeux->getToken() + 1);
		}
		else {
			$tokenJeuxN->setToken(1);
		}
		$tokenJeuxN->setNbrQuestion(1);
		$tokenJeuxN->setUser($author);
		$tokenJeuxN->setJeux($jeux);
		$tokenJeuxN->setResponseTrue(0);
		$tokenJeuxN->setNbrAnswered(0);
		$this->em->persist($tokenJeuxN);
		$this->em->flush();

		return $tokenJeuxN;
	}

	public function validJeux($question, $rep)
	{
		//mise en place du calcul
		$questionString = $this->responseClean($question->getQuestion());
		$calc           = ceil(strlen($questionString) / 4);
		$lev            = levenshtein($questionString, $rep);
		//calcul
		if($lev <= $calc) {
			$isValid = 1;
		}
		else {
			$isValid = 0;
		}

		return $isValid;
	}

	public function str_to_noaccent($str, $charset = 'utf-8')
	{
		$str = htmlentities($str, ENT_NOQUOTES, $charset);
		$str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
		$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
		$str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
		return ($str);
	}

	public function savPost($responseString, $isValid, $question, $tokenJeux, $jeux, $user)
	{
		//TODO SECURITY NE PAS SAV UNE RESP DEJA SAV
		$response = new Response();
		$response->setResponse($responseString);
		$response->setIsValid($isValid);
		$response->setQuestion($question);
		$response->setTokenJeux($tokenJeux);
		$response->setUser($user);
		$tokenJeux->setResponseTrue($tokenJeux->getResponseTrue() + $isValid);
		$tokenJeux->setNbrAnswered($tokenJeux->getNbrAnswered() + 1);
		$this->em->persist($response);
		$this->em->persist($tokenJeux);
		$this->em->flush();

		return $response;
	}

	public function tokenJeuxClean($tokenJeux)
	{
		$token = preg_replace('/_[0-9]+/', '', $tokenJeux);

		return $token;
	}

	function responseClean($response)
	{
		$response = strtolower($response);
		$response = preg_replace('/[^a-z0-9-]+/', '-', $response);
		//  =(non testé) $response = preg_replace('/\W+/', '-', $response);
		$response = strip_tags($response);

		return $response;
	}

}