<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jeux
 * @ORM\Table(name="jeux")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\JeuxRepository")
 */
class Jeux
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
	 * @ORM\Column(name="name", type="string", length=50)
	 */
	private $name;

	/**
	 * @ORM\OneToMany(targetEntity="TokenJeux", mappedBy="jeux")
	 */
	private $tokenJeux;

	/**
	 * @ORM\OneToMany(targetEntity="Question", mappedBy="jeux")
	 */
	private $question;


	/**
	 * Get id
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set name
	 * @param string $name
	 * @return Jeux
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->tokenJeux = new \Doctrine\Common\Collections\ArrayCollection();
		$this->question  = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add tokenJeux
	 * @param \HolluxBundle\Entity\tokenJeux $tokenJeux
	 * @return Jeux
	 */
	public function addTokenJeux(\HolluxBundle\Entity\TokenJeux $tokenJeux)
	{
		$this->tokenJeux[] = $tokenJeux;

		return $this;
	}

	/**
	 * Remove tokenJeux
	 * @param \HolluxBundle\Entity\tokenJeux $tokenJeux
	 */
	public function removeTokenJeux(\HolluxBundle\Entity\TokenJeux $tokenJeux)
	{
		$this->tokenJeux->removeElement($tokenJeux);
	}

	/**
	 * Get tokenJeux
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getTokenJeux()
	{
		return $this->tokenJeux;
	}

	/**
	 * Add question
	 * @param \HolluxBundle\Entity\Question $question
	 * @return Jeux
	 */
	public function addQuestion(\HolluxBundle\Entity\Question $question)
	{
		$this->question[] = $question;

		return $this;
	}

	/**
	 * Remove question
	 * @param \HolluxBundle\Entity\Question $question
	 */
	public function removeQuestion(\HolluxBundle\Entity\Question $question)
	{
		$this->question->removeElement($question);
	}

	/**
	 * Get question
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getQuestion()
	{
		return $this->question;
	}
}
