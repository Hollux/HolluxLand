<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mycologie
 * @ORM\Table(name="vet_anabel_mycologie")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\MycologieRepository")
 */
class Mycologie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\OneToOne(targetEntity="Avortement", mappedBy="mycologie", cascade={"persist", "remove"})
     */
    private $avortement;

    /**
     * @var string
     *
     * @ORM\Column(name="mycologiemycologie", type="string", length=255, nullable=true)
     */
    private $mycologiemycologie;
    

    /**
     * @var string
     *
     * @ORM\Column(name="mycologieidentificationmycologie", type="string", length=255, nullable=true)
     */
    private $mycologieidentificationmycologie;
    

    /**
     * @var string
     *
     * @ORM\Column(name="mycologieresultatquantitatifmycologie", type="string", length=255, nullable=true)
     */
    private $mycologieresultatquantitatifmycologie;
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mycologiemycologie
     *
     * @param string $mycologiemycologie
     *
     * @return Mycologie
     */
    public function setMycologiemycologie($mycologiemycologie)
    {
        $this->mycologiemycologie = $mycologiemycologie;

        return $this;
    }

    /**
     * Get mycologiemycologie
     *
     * @return string
     */
    public function getMycologiemycologie()
    {
        return $this->mycologiemycologie;
    }

    /**
     * Set mycologieidentificationmycologie
     *
     * @param string $mycologieidentificationmycologie
     *
     * @return Mycologie
     */
    public function setMycologieidentificationmycologie($mycologieidentificationmycologie)
    {
        $this->mycologieidentificationmycologie = $mycologieidentificationmycologie;

        return $this;
    }

    /**
     * Get mycologieidentificationmycologie
     *
     * @return string
     */
    public function getMycologieidentificationmycologie()
    {
        return $this->mycologieidentificationmycologie;
    }

    /**
     * Set mycologieresultatquantitatifmycologie
     *
     * @param string $mycologieresultatquantitatifmycologie
     *
     * @return Mycologie
     */
    public function setMycologieresultatquantitatifmycologie($mycologieresultatquantitatifmycologie)
    {
        $this->mycologieresultatquantitatifmycologie = $mycologieresultatquantitatifmycologie;

        return $this;
    }

    /**
     * Get mycologieresultatquantitatifmycologie
     *
     * @return string
     */
    public function getMycologieresultatquantitatifmycologie()
    {
        return $this->mycologieresultatquantitatifmycologie;
    }

    /**
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return Mycologie
     */
    public function setAvortement(\VetBundle\Entity\Avortement $avortement = null)
    {
        $this->avortement = $avortement;

        return $this;
    }

    /**
     * Get avortement
     *
     * @return \VetBundle\Entity\Avortement
     */
    public function getAvortement()
    {
        return $this->avortement;
    }
}
