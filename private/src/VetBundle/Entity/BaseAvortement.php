<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseAvortement
 * @ORM\Table(name="vet_anabel_baseavortement")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\BaseAvortementRepository")
 */
class BaseAvortement
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
     * @ORM\OneToOne(targetEntity="Avortement", mappedBy="baseavortement", cascade={"persist", "remove"})
     */
    private $avortement;

    /**
     * @var \datetime
     *
     * @ORM\Column(name="baseavortementdateavortement", type="date", nullable=true)
     */
    private $baseavortementdateavortement;
    

    /**
     * @var string
     *
     * @ORM\Column(name="baseavortementtypedeprelevement", type="string", length=255, nullable=true)
     */
    private $baseavortementtypedeprelevement;
    

    /**
     * @var string
     *
     * @ORM\Column(name="baseavortementlesionsautopsie", type="string", length=255, nullable=true)
     */
    private $baseavortementlesionsautopsie;
    

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
     * Set baseavortementdateavortement
     *
     * @param \DateTime $baseavortementdateavortement
     *
     * @return BaseAvortement
     */
    public function setBaseavortementdateavortement($baseavortementdateavortement)
    {
        $this->baseavortementdateavortement = $baseavortementdateavortement;

        return $this;
    }

    /**
     * Get baseavortementdateavortement
     *
     * @return \DateTime
     */
    public function getBaseavortementdateavortement()
    {
        return $this->baseavortementdateavortement;
    }

    /**
     * Set baseavortementtypedeprelevement
     *
     * @param string $baseavortementtypedeprelevement
     *
     * @return BaseAvortement
     */
    public function setBaseavortementtypedeprelevement($baseavortementtypedeprelevement)
    {
        $this->baseavortementtypedeprelevement = $baseavortementtypedeprelevement;

        return $this;
    }

    /**
     * Get baseavortementtypedeprelevement
     *
     * @return string
     */
    public function getBaseavortementtypedeprelevement()
    {
        return $this->baseavortementtypedeprelevement;
    }

    /**
     * Set baseavortementlesionsautopsie
     *
     * @param string $baseavortementlesionsautopsie
     *
     * @return BaseAvortement
     */
    public function setBaseavortementlesionsautopsie($baseavortementlesionsautopsie)
    {
        $this->baseavortementlesionsautopsie = $baseavortementlesionsautopsie;

        return $this;
    }

    /**
     * Get baseavortementlesionsautopsie
     *
     * @return string
     */
    public function getBaseavortementlesionsautopsie()
    {
        return $this->baseavortementlesionsautopsie;
    }

    /**
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return BaseAvortement
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
