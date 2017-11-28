<?php
namespace AppBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Doctrine\ORM\EntityManagerInterface;

class LoginListener
{

	private $authorizationChecker;
	private $em;

	/**
	 * Constructor
	 * @param SecurityContext $securityContext
	 * @param Doctrine        $doctrine
	 */
	public function __construct(AuthorizationChecker $authorizationChecker, EntityManagerInterface $em)
	{
		$this->authorizationChecker = $authorizationChecker;
		$this->em           = $em;
	}

	/**
	 * Do the magic.
	 * @param InteractiveLoginEvent $event
	 */
	public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
	{
		if($this->authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
			// user has just logged in
		}
		if($this->authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
		//if($this->securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
			// user has logged in using remember_me cookie
		}
		// do some other magic here

		$user = $event->getAuthenticationToken()->getUser();
		$user->datePreUpdate();
		$this->em->persist($user);
		$this->em->flush();
	}
}