<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 * @ORM\Table(name="cata_test_categorie")
 */
class Categorie
{
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $createdAt;

	public function __construct()
	{
		$this->createdAt = new \dateTime('now');
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getCreated_at()
	{
		return $this->createdAt;
	}

	/**
	 * Set name
	 * @param string $name
	 * @return Categorie
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Set createdAt
	 * @param \DateTime $createdAt
	 * @return Categorie
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Get createdAt
	 * @return \DateTime
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}
}
