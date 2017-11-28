<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VilleRepository")
 */
class Ville
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="Departement", inversedBy="villes")
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity="HolluxBundle\Entity\Veterinaire", mappedBy="ville")
     */
    private $veterinaires;


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
     * Set name
     *
     * @param string $name
     *
     * @return Ville
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Ville
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->veterinaires = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set departement
     *
     * @param \AppBundle\Entity\Departement $departement
     *
     * @return Ville
     */
    public function setDepartement(\AppBundle\Entity\Departement $departement = null)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \AppBundle\Entity\Departement
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Add veterinaire
     *
     * @param \HolluxBundle\Entity\Veterinaire $veterinaire
     *
     * @return Ville
     */
    public function addVeterinaire(\HolluxBundle\Entity\Veterinaire $veterinaire)
    {
        $this->veterinaires[] = $veterinaire;

        return $this;
    }

    /**
     * Remove veterinaire
     *
     * @param \HolluxBundle\Entity\Veterinaire $veterinaire
     */
    public function removeVeterinaire(\HolluxBundle\Entity\Veterinaire $veterinaire)
    {
        $this->veterinaires->removeElement($veterinaire);
    }

    /**
     * Get veterinaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVeterinaires()
    {
        return $this->veterinaires;
    }

    public function __toString()
    {

        return $this->code.' '.$this->name;
    }
}
