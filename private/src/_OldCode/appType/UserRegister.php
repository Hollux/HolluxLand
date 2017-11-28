<?php
namespace AppBundle\Listener\ORM;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\Templating\EngineInterface;
use AppBundle\Component\Mailer\MyCustomMailer;
use AppBundle\Component\Mailer\Message;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRegister
{
	protected $templating;
	protected $mycustommailer;
	protected $userClassName;

	public function __construct(EngineInterface $templating, MyCustomMailer $myCustomMailer, $userClassName)
	{
		$this->templating     = $templating;
		$this->myCustomMailer = $myCustomMailer;
        $this->userClassName = $userClassName;
	}

	public function prePersist(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();
		if($entity instanceof UserInterface) {

			$body = $this->templating->render('Mail/mailRegister.html.twig',
				['user' => $entity]);
			$this->myCustomMailer->send(new Message(
					'Inscription Hollux.fr',
					'hollux@hollux.com',
					$entity->getLogin(),
					$body)

			);
		}
	}

}