<?php
namespace AppBundle\Component\Mailer;

class Message
{
	protected $subject;
	protected $from;
	protected $to;
	protected $body;

	public function __construct($subject, $from, $to, $body)
	{
		$this->subject = $subject;
		$this->from = $from;
		$this->to = $to;
		$this->body = $body;
	}

	public function getSubject()
	{
		return $this->subject;
	}
	public function getFrom()
	{
		return $this->from;
	}
	public function getTo()
	{
		return $this->to;
	}
	public function getBody()
	{
		return $this->body;
	}

}