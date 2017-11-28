<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\QuestionRepository")
 */
class Question
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
	 * @ORM\Column(name="question", type="string", length=255)
	 */
	private $question;

	/**
	 * @var int
	 * @ORM\Column(name="number", type="integer")
	 */
	private $number;

	/**
	 * @ORM\ManyToOne(targetEntity="Jeux", inversedBy="question", cascade={"persist","remove"})
	 * @ORM\JoinColumn(name="jeux_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $jeux;

	/**
	 * @ORM\OneToMany(targetEntity="Response", mappedBy="question")
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
	 * Set question
	 * @param string $question
	 * @return Question
	 */
	public function setQuestion($question)
	{
		$this->question = $question;

		return $this;
	}

	/**
	 * Get question
	 * @return string
	 */
	public function getQuestion()
	{
		return $this->question;
	}

	/**
	 * Set number
	 * @param int $number
	 * @return Question
	 */
	public function setNumber($number)
	{
		$this->number = $number;

		return $this;
	}

	/**
	 * Get number
	 * @return int
	 */
	public function getNumber()
	{
		return $this->number;
	}

	/**
	 * Set jeux
	 * @param \HolluxBundle\Entity\Jeux $jeux
	 * @return Question
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
	 * Constructor
	 */
	public function __construct()
	{
		$this->response = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add response
	 * @param \HolluxBundle\Entity\Response $response
	 * @return Question
	 */
	public function addResponse(\HolluxBundle\Entity\Response $response)
	{
		$this->response[] = $response;

		return $this;
	}

	/**
	 * Remove response
	 * @param \HolluxBundle\Entity\Response $response
	 */
	public function removeResponse(\HolluxBundle\Entity\Response $response)
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
}
