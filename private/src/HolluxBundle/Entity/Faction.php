<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 * @ORM\Table(name="faction")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\FactionRepository")
 */
class Faction
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
	 * @ORM\Column(name="name", type="string", length=50, unique=true)
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column(name="picture", type="string", length=255, nullable=true)
	 */
	private $picture;

	/**
	 * @ORM\ManyToOne(targetEntity="BoiteSmashUp", inversedBy="faction", cascade={"persist","remove"})
	 * @ORM\JoinColumn(name="boiteSmashUp_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $boiteSmashUp;


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
	 * @return Faction
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
	 * Set picture
	 * @param string $picture
	 * @return Faction
	 */
	public function setPicture($picture)
	{
		$this->picture = $picture;

		return $this;
	}

	/**
	 * Get picture
	 * @return string
	 */
	public function getPicture()
	{
		return $this->picture;
	}

	/**
	 * Set boiteSmashUp
	 * @param \HolluxBundle\Entity\BoiteSmashUp $boiteSmashUp
	 * @return Faction
	 */
	public function setBoiteSmashUp(\HolluxBundle\Entity\BoiteSmashUp $boiteSmashUp = null)
	{
		$this->boiteSmashUp = $boiteSmashUp;

		return $this;
	}

	/**
	 * Get boiteSmashUp
	 * @return \HolluxBundle\Entity\BoiteSmashUp
	 */
	public function getBoiteSmashUp()
	{
		return $this->boiteSmashUp;
	}
}
