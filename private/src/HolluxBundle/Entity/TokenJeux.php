<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TokenJeux
 * @ORM\Table(name="tokenjeux")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\TokenJeuxRepository")
 */
class TokenJeux
{
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var integer
	 * @ORM\Column(name="token", type="integer")
	 */
	private $token;

	/**
	 * @var integer
	 * @ORM\Column(name="nbrQuestion", type="integer")
	 */
	private $nbrQuestion;

	/**
	 * @var integer
	 * @ORM\Column(name="responseTrue", type="integer")
	 */
	private $responseTrue;

	/**
	 * @var integer
	 * @ORM\Column(name="nbrAnswered", type="integer")
	 */
	private $nbrAnswered;

	/**
	 * @ORM\ManyToOne(targetEntity="HolluxBundle\Entity\User", inversedBy="tokenJeux", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $user;

	/**
	 * @ORM\ManyToOne(targetEntity="Jeux", inversedBy="tokenJeux", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="jeux_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $jeux;

	/**
	 * @ORM\OneToMany(targetEntity="Response", mappedBy="tokenJeux")
	 */
	private $response;


	/**
	 * Get id
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set token
	 * @param string $token
	 * @return TokenJeux
	 */
	public function setToken($token)
	{
		$this->token = $token;

		return $this;
	}

	/**
	 * Get token
	 * @return string
	 */
	public function getToken()
	{
		return $this->token;
	}

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->response = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Set user
	 * @param \HolluxBundle\Entity\User $user
	 * @return TokenJeux
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
	 * Set jeux
	 * @param \HolluxBundle\Entity\Jeux $jeux
	 * @return TokenJeux
	 */
	public function setJeux(\HolluxBundle\Entity\Jeux $jeux = null)
	{
		$this->jeux = $jeux;

		return $this;
	}

	/**
	 * Get jeux
	 * @return \HolluxBundle\Entity\Jeux
	 */
	public function getJeux()
	{
		return $this->jeux;
	}

	/**
	 * Add response
	 * @param \HolluxBundle\Entity\response $response
	 * @return TokenJeux
	 */
	public function addResponse(\HolluxBundle\Entity\response $response)
	{
		$this->response[] = $response;

		return $this;
	}

	/**
	 * Remove response
	 * @param \HolluxBundle\Entity\response $response
	 */
	public function removeResponse(\HolluxBundle\Entity\response $response)
	{
		$this->response->removeElement($response);
	}

	/**
	 * Get response
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getResponse()
	{
		return $this->response;
	}

	/**
	 * Set nbrQuestion
	 * @param integer $nbrQuestion
	 * @return TokenJeux
	 */
	public function setNbrQuestion($nbrQuestion)
	{
		$this->nbrQuestion = $nbrQuestion;

		return $this;
	}

	/**
	 * Get nbrQuestion
	 * @return integer
	 */
	public function getNbrQuestion()
	{
		return $this->nbrQuestion;
	}

	/**
	 * Set responseTrue
	 * @param integer $responseTrue
	 * @return TokenJeux
	 */
	public function setResponseTrue($responseTrue)
	{
		$this->responseTrue = $responseTrue;

		return $this;
	}

	/**
	 * Get responseTrue
	 * @return integer
	 */
	public function getResponseTrue()
	{
		return $this->responseTrue;
	}

	/**
	 * Set nbrAnswered
	 * @param integer $nbrAnswered
	 * @return TokenJeux
	 */
	public function setNbrAnswered($nbrAnswered)
	{
		$this->nbrAnswered = $nbrAnswered;

		return $this;
	}

	/**
	 * Get nbrAnswered
	 * @return integer
	 */
	public function getNbrAnswered()
	{
		return $this->nbrAnswered;
	}
}
