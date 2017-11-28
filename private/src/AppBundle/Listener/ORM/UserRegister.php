<?php
namespace AppBundle\Listener\ORM;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\User;
use Symfony\Component\Templating\EngineInterface;
use AppBundle\Component\Mailer\MyCustomMailer;
use AppBundle\Component\Mailer\Message;

class UserRegister
{
	protected $templating;
	protected $myCustomMailer;

	public function __construct(EngineInterface $templating, MyCustomMailer $myCustomMailer)
	{
		$this->templating     = $templating;
		$this->myCustomMailer = $myCustomMailer;
	}

	public function prePersist(LifecycleEventArgs $args)
	{
		$entity = $args->getEntity();
		if($entity instanceof User) {
			$body = $this->templating->render('Mail/mailRegister.html.twig', ['user' => $entity]);
			$this->myCustomMailer->send(new Message('Inscription Hollux.fr', 'hollux@hollux.com', $entity->getMail(),
					$body));
		}
	}

}