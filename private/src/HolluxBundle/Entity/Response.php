<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Response
 * @ORM\Table(name="response")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\ResponseRepository")
 */
class Response
{
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(name="response", type="string", length=255)
	 */
	private $response;

	/**
	 * @var int
	 * @ORM\Column(name="isValid", type="integer")
	 */
	private $isValid;

	/**
	 * @ORM\ManyToOne(targetEntity="Question", inversedBy="response", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $question;

	/**
	 * @ORM\ManyToOne(targetEntity="TokenJeux", inversedBy="response", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="tokenJeux_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $tokenJeux;

	/**
	 * @ORM\ManyToOne(targetEntity="HolluxBundle\Entity\User", inversedBy="response", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $user;


	/**
	 * Get id
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set response
	 * @param string $response
	 * @return Response
	 */
	public function setResponse($response)
	{
		$this->response = $response;

		return $this;
	}

	/**
	 * Get response
	 * @return string
	 */
	public function getResponse()
	{
		return $this->response;
	}

	/**
	 * Set question
	 * @param \HolluxBundle\Entity\question $question
	 * @return Response
	 */
	public function setQuestion(\HolluxBundle\Entity\question $question = null)
	{
		$this->question = $question;

		return $this;
	}

	/**
	 * Get question
	 * @return \HolluxBundle\Entity\question
	 */
	public function getQuestion()
	{
		return $this->question;
	}

	/**
	 * Set tokenJeux
	 * @param \HolluxBundle\Entity\tokenJeux $tokenJeux
	 * @return Response
	 */
	public function setTokenJeux(\HolluxBundle\Entity\tokenJeux $tokenJeux = null)
	{
		$this->tokenJeux = $tokenJeux;

		return $this;
	}

	/**
	 * Get tokenJeux
	 * @return \HolluxBundle\Entity\tokenJeux
	 */
	public function getTokenJeux()
	{
		return $this->tokenJeux;
	}

	/**
	 * Set user
	 * @param \HolluxBundle\Entity\User $user
	 * @return Response
	 */
	public function setUser(\HolluxBundle\Entity\User $user = null)
	{
		$this->user = $user;

		return $this;
	}

	/**
	 * Get user
	 * @return \HolluxBundle\Entity\User
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * Set isValid
	 * @param integer $isValid
	 * @return Response
	 */
	public function setIsValid($isValid)
	{
		$this->isValid = $isValid;

		return $this;
	}

	/**
	 * Get isValid
	 * @return integer
	 */
	public function getIsValid()
	{
		return $this->isValid;
	}
}
