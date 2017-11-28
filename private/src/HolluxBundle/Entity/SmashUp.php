<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SmashUp
 * @ORM\Table(name="smash_up")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\SmashUpRepository")
 */
class SmashUp
{
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\OneToMany(targetEntity="BoiteSmashUp", mappedBy="smashUp")
	 */
	private $boites;


	/**
	 * Get id
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set id
	 * @param integer $id
	 * @return int
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->boites = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add boite
	 * @param \HolluxBundle\Entity\BoiteSmashUp $boite
	 * @return SmashUp
	 */
	public function addBoite(\HolluxBundle\Entity\BoiteSmashUp $boite)
	{
		$this->boites[] = $boite;

		return $this;
	}

	/**
	 * Remove boite
	 * @param \HolluxBundle\Entity\BoiteSmashUp $boite
	 */
	public function removeBoite(\HolluxBundle\Entity\BoiteSmashUp $boite)
	{
		$this->boites->removeElement($boite);
	}

	/**
	 * Get boites
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getBoites()
	{
		return $this->boites;
	}
}
