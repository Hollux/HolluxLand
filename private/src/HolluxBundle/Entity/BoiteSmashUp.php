<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BoiteSmashUp
 * @ORM\Table(name="boite_smash_up")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\BoiteSmashUpRepository")
 */
class BoiteSmashUp
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
	 * @ORM\OneToMany(targetEntity="Faction", mappedBy="boiteSmashUp")
	 */
	private $faction;

	/**
	 * @ORM\ManyToOne(targetEntity="HolluxBundle\Entity\SmashUp", inversedBy="boites", cascade={"persist", "remove"})
	 * @ORM\JoinColumn(name="base_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $smashUp;



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
	 * @return BoiteSmashUp
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
	 * @return BoiteSmashUp
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
	 * Constructor
	 */
	public function __construct()
	{
		$this->faction = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Add faction
	 * @param \HolluxBundle\Entity\Faction $faction
	 * @return BoiteSmashUp
	 */
	public function addFaction(\HolluxBundle\Entity\Faction $faction)
	{
		$this->faction[] = $faction;

		return $this;
	}

	/**
	 * Remove faction
	 * @param \HolluxBundle\Entity\Faction $faction
	 */
	public function removeFaction(\HolluxBundle\Entity\Faction $faction)
	{
		$this->faction->removeElement($faction);
	}

	/**
	 * Get faction
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getFaction()
	{
		return $this->faction;
	}

    /**
     * Set base
     *
     * @param \HolluxBundle\Entity\SmashUp $base
     *
     * @return BoiteSmashUp
     */
    public function setBase(\HolluxBundle\Entity\SmashUp $base = null)
    {
        $this->base = $base;

        return $this;
    }

    /**
     * Get base
     *
     * @return \HolluxBundle\Entity\SmashUp
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Set smashUp
     *
     * @param \HolluxBundle\Entity\SmashUp $smashUp
     *
     * @return BoiteSmashUp
     */
    public function setSmashUp(\HolluxBundle\Entity\SmashUp $smashUp = null)
    {
        $this->smashUp = $smashUp;

        return $this;
    }

    /**
     * Get smashUp
     *
     * @return \HolluxBundle\Entity\SmashUp
     */
    public function getSmashUp()
    {
        return $this->smashUp;
    }
}
