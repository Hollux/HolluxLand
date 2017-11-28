<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partie
 * @ORM\Table(name="partie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartieRepository")
 */
class Partie
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
	 * @ORM\Column(name="game", type="string", length=50)
	 */
	private $game;

	/**
	 * @var int
	 * @ORM\Column(name="valid", type="integer")
	 */
	private $valid;

	/**
	 * @var string
	 * @ORM\Column(name="response", type="string", length=255)
	 */
	private $response;

	/**
	 * @ORM\ManyToOne(targetEntity="HolluxBundle\Entity\User", cascade={"persist","remove"})
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $author;

	/**
	 * @ORM\ManyToOne(targetEntity="HolluxBundle\Entity\Jeux", cascade={"persist","remove"})
	 * @ORM\JoinColumn(name="jeux_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $jeux;


	/**
	 * Get id
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set game
	 * @param integer $game
	 * @return Partie
	 */
	public function setGame($game)
	{
		$this->game = $game;

		return $this;
	}

	/**
	 * Get game
	 * @return int
	 */
	public function getGame()
	{
		return $this->game;
	}

	/**
	 * Set valid
	 * @param integer $valid
	 * @return Partie
	 */
	public function setValid($valid)
	{
		$this->valid = $valid;

		return $this;
	}

	/**
	 * Get valid
	 * @return int
	 */
	public function getValid()
	{
		return $this->valid;
	}

	/**
	 * Set response
	 * @param string $response
	 * @return Partie
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
	 * Set author
	 * @param \HolluxBundle\Entity\User $author
	 * @return Partie
	 */
	public function setAuthor(\HolluxBundle\Entity\User $author = null)
	{
		$this->author = $author;

		return $this;
	}

	/**
	 * Get author
	 * @return \HolluxBundle\Entity\User
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * Set jeux
	 * @param \HolluxBundle\Entity\Jeux $jeux
	 * @return Partie
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
}
