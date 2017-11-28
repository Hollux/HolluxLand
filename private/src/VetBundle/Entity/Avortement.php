<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avortement
 * @ORM\Table(name="vet_anabel_avortement")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\AvortementRepository")
 */
class Avortement
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
     * @ORM\OneToOne(targetEntity="BaseAvortement", inversedBy="avortement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="baseavortement_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $baseavortement;

    /**
     * @ORM\OneToOne(targetEntity="Bacteriologie", inversedBy="avortement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="bacteriologie_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $bacteriologie;

    /**
     * @ORM\OneToOne(targetEntity="PCR", inversedBy="avortement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="pcr_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $pcr;

    /**
     * @ORM\OneToOne(targetEntity="Mycologie", inversedBy="avortement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="mycologie_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $mycologie;

    /**
     * @ORM\OneToOne(targetEntity="Serologie", inversedBy="avortement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="serologie_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $serologie;

     /**
     * @var string
     * @ORM\Column(name="informationcomplementaire", type = "text", nullable = true)
     */
    private $informationcomplementaire;

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
     * Set informationcomplementaire
     *
     * @param string $informationcomplementaire
     *
     * @return Avortement
     */
    public function setInformationcomplementaire($informationcomplementaire)
    {
        $this->informationcomplementaire = $informationcomplementaire;

        return $this;
    }

    /**
     * Get informationcomplementaire
     *
     * @return string
     */
    public function getInformationcomplementaire()
    {
        return $this->informationcomplementaire;
    }

    /**
     * Set baseavortement
     *
     * @param \VetBundle\Entity\BaseAvortement $baseavortement
     *
     * @return Avortement
     */
    public function setBaseavortement(\VetBundle\Entity\BaseAvortement $baseavortement = null)
    {
        $this->baseavortement = $baseavortement;

        return $this;
    }

    /**
     * Get baseavortement
     *
     * @return \VetBundle\Entity\BaseAvortement
     */
    public function getBaseavortement()
    {
        return $this->baseavortement;
    }

    /**
     * Set bacteriologie
     *
     * @param \VetBundle\Entity\Bacteriologie $bacteriologie
     *
     * @return Avortement
     */
    public function setBacteriologie(\VetBundle\Entity\Bacteriologie $bacteriologie = null)
    {
        $this->bacteriologie = $bacteriologie;

        return $this;
    }

    /**
     * Get bacteriologie
     *
     * @return \VetBundle\Entity\Bacteriologie
     */
    public function getBacteriologie()
    {
        return $this->bacteriologie;
    }

    /**
     * Set pcr
     *
     * @param \VetBundle\Entity\PCR $pcr
     *
     * @return Avortement
     */
    public function setPcr(\VetBundle\Entity\PCR $pcr = null)
    {
        $this->pcr = $pcr;

        return $this;
    }

    /**
     * Get pcr
     *
     * @return \VetBundle\Entity\PCR
     */
    public function getPcr()
    {
        return $this->pcr;
    }

    /**
     * Set mycologie
     *
     * @param \VetBundle\Entity\Mycologie $mycologie
     *
     * @return Avortement
     */
    public function setMycologie(\VetBundle\Entity\Mycologie $mycologie = null)
    {
        $this->mycologie = $mycologie;

        return $this;
    }

    /**
     * Get mycologie
     *
     * @return \VetBundle\Entity\Mycologie
     */
    public function getMycologie()
    {
        return $this->mycologie;
    }

    /**
     * Set serologie
     *
     * @param \VetBundle\Entity\Serologie $serologie
     *
     * @return Avortement
     */
    public function setSerologie(\VetBundle\Entity\Serologie $serologie = null)
    {
        $this->serologie = $serologie;

        return $this;
    }

    /**
     * Get serologie
     *
     * @return \VetBundle\Entity\Serologie
     */
    public function getSerologie()
    {
        return $this->serologie;
    }
}
