<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VirologieAutresOrganes
 *
 * @ORM\Table(name="vet_anabel_virologie_autresorganes")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\VirologieAutresOrganesRepository")
 */
class VirologieAutresOrganes
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
     * @ORM\OneToOne(targetEntity="Anabel", mappedBy="virologieautresorganes", cascade={"persist", "remove"})
     */
    private $anabel;

    /**
     * @ORM\OneToMany(targetEntity="Antibiogramme", mappedBy="virologieautresorganes", cascade={"persist", "remove"})
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
     * @return VirologieAutresOrganes
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
     * @return VirologieAutresOrganes
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
     * @return VirologieAutresOrganes
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
