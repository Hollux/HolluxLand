<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use HolluxBundle\Entity\User;

class MailController extends Controller
{
	/**
	 * @Route("/mailtest", name="mailtest")
	 * @Template
	 */
	public function mailtestAction()
	{
		return [];
	}

	/**
	 * @Route("/mail", name="mail")
	 * @Template
	 */
	public function mailRegisterAction()
	{
		$user = new User();
		$user->setName('holluxError');
		$user->setMail('holluxpanda@gmail.com');
		$user->setPassword('toto');

		$message = \Swift_Message::newInstance()
			->setSubject('Inscription Hollux.fr')
			->setFrom('hollux@hollux.fr')
			->setTo($user->getMail())
			->setBody($this->renderView('Mail/mailRegister.html.twig', ['user' => $user]),
				'text/html');
		$this->get('mailer')->send($message);

		return $this->redirectToRoute('home');
	}
}