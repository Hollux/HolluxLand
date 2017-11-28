<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BacteriologieAutreOrganes
 *
 * @ORM\Table(name="vet_anabel_bacteriologie_autresorganes")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\BacteriologieAutresOrganesRepository")
 */
class BacteriologieAutresOrganes
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
     * @ORM\OneToOne(targetEntity="Anabel", mappedBy="bacteriologieautreorganes", cascade={"persist", "remove"})
     */
    private $anabel;

    /**
     * @ORM\OneToMany(targetEntity="Antibiogramme", mappedBy="bacteriologieautreorganes", cascade={"persist", "remove"})
     */
    private $antibiogrammes;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set anabel
     *
     * @param \VetBundle\Entity\Anabel $anabel
     *
     * @return BacteriologieAutresOrganes
     */
    public function setAnabel(\VetBundle\Entity\Anabel $anabel = null)
    {
        $this->anabel = $anabel;

        return $this;
    }

    /**
     * Get anabel
     *
     * @return \VetBundle\Entity\Anabel
     */
    public function getAnabel()
    {
        return $this->anabel;
    }

    /**
     * Set antibiogramme
     *
     * @param \VetBundle\Entity\Antibiogramme $antibiogramme
     *
     * @return BacteriologieAutresOrganes
     */
    public function setAntibiogramme(\VetBundle\Entity\Antibiogramme $antibiogramme = null)
    {
        $this->antibiogramme = $antibiogramme;

        return $this;
    }

    /**
     * Get antibiogramme
     *
     * @return \VetBundle\Entity\Antibiogramme
     */
    public function getAntibiogramme()
    {
        return $this->antibiogramme;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->antibiogrammes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add antibiogramme
     *
     * @param \VetBundle\Entity\Antibiogramme $antibiogramme
     *
     * @return BacteriologieAutresOrganes
     */
    public function addAntibiogramme(\VetBundle\Entity\Antibiogramme $antibiogramme)
    {
        $this->antibiogrammes[] = $antibiogramme;

        return $this;
    }

    /**
     * Remove antibiogramme
     *
     * @param \VetBundle\Entity\Antibiogramme $antibiogramme
     */
    public function removeAntibiogramme(\VetBundle\Entity\Antibiogramme $antibiogramme)
    {
        $this->antibiogrammes->removeElement($antibiogramme);
    }

    /**
     * Get antibiogrammes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAntibiogrammes()
    {
        return $this->antibiogrammes;
    }
}
