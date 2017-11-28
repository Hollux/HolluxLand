<?php
namespace AppBundle\Component\Mailer;

use Swift_Mailer;
use Swift_Message;

class MyCustomMailer
{
	protected $mailer;

	public function __construct(Swift_mailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function send(Message $message)
	{
		$message = Swift_Message::newInstance()
			->setSubject($message->getSubject())
			->setFrom($message->getFrom())
			->setTo($message->getTo())
			->setBody($message->getBody(), 'text/html');
		$this->mailer->send($message);
	}
}