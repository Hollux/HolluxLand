<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Informationscomplementaires
 * @ORM\Table(name="vet_anabel_informationscomplementaires")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\InformationscomplementairesRepository")
 */
class Informationscomplementaires
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
     * @ORM\OneToOne(targetEntity="Avortement", mappedBy="informationscomplementaires", cascade={"persist", "remove"})
     */
    private $avortement;
                  
    /**
     * @var text
     * @ORM\Column(name="informationscomplementairescommentaires", type="text", nullable=true)
     */
    private $informationscomplementairescommentaires;

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
     * Set informationscomplementairescommentaires
     *
     * @param string $informationscomplementairescommentaires
     *
     * @return Informationscomplementaires
     */
    public function setInformationscomplementairescommentaires($informationscomplementairescommentaires)
    {
        $this->informationscomplementairescommentaires = $informationscomplementairescommentaires;

        return $this;
    }

    /**
     * Get informationscomplementairescommentaires
     *
     * @return string
     */
    public function getInformationscomplementairescommentaires()
    {
        return $this->informationscomplementairescommentaires;
    }

    /**
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return Informationscomplementaires
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
