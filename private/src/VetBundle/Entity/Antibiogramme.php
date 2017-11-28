<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Antibiogramme
 *
 * @ORM\Table(name="vet_anabel_antibiogramme")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\AntibiogrammeRepository")
 */
class Antibiogramme
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
     * @ORM\ManyToOne(targetEntity="Avortement", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="avortement_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $avortement;

    /**
     * @ORM\ManyToOne(targetEntity="BacteriologieAutresOrganes", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="bacteriologieautreorganes_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $bacteriologieautreorganes;

    /**
     * @ORM\ManyToOne(targetEntity="BacteriologieFeces", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="bacteriologiefeces_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $bacteriologiefeces;

    /**
     * @ORM\ManyToOne(targetEntity="BacteriologieLaitMammite", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="bacteriologielaitmammite_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $bacteriologielaitmammite;

    /**
     * @ORM\ManyToOne(targetEntity="ComptageCellulaire", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="comptagecellulaire_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $comptagecellulaire;

    /**
     * @ORM\ManyToOne(targetEntity="InhibiteursLait", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="inhibiteurslait_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $inhibiteurslait;

    /**
     * @ORM\ManyToOne(targetEntity="Parasitologie", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="parasitologie_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $parasitologie;

    /**
     * @ORM\ManyToOne(targetEntity="PCR", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="pcr_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $pcr;

    /**
     * @ORM\ManyToOne(targetEntity="Serologie", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="serologie_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $serologie;

    /**
     * @ORM\ManyToOne(targetEntity="VirologieAutresOrganes", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="virologieautresorganes_id", referencedColumnName="id", nullable=true, onDelete="set null")

     */
    private $virologieautresorganes;

    /**
     * @ORM\ManyToOne(targetEntity="VirologieFeces", inversedBy="antibiogrammes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="virologiefeces_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $virologiefeces;


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
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return Antibiogramme
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

    /**
     * Set bacteriologieautreorganes
     *
     * @param \VetBundle\Entity\BacteriologieAutresOrganes $bacteriologieautreorganes
     *
     * @return Antibiogramme
     */
    public function setBacteriologieautreorganes(\VetBundle\Entity\BacteriologieAutresOrganes $bacteriologieautreorganes = null)
    {
        $this->bacteriologieautreorganes = $bacteriologieautreorganes;

        return $this;
    }

    /**
     * Get bacteriologieautreorganes
     *
     * @return \VetBundle\Entity\BacteriologieAutresOrganes
     */
    public function getBacteriologieautreorganes()
    {
        return $this->bacteriologieautreorganes;
    }

    /**
     * Set bacteriologiefeces
     *
     * @param \VetBundle\Entity\BacteriologieFeces $bacteriologiefeces
     *
     * @return Antibiogramme
     */
    public function setBacteriologiefeces(\VetBundle\Entity\BacteriologieFeces $bacteriologiefeces = null)
    {
        $this->bacteriologiefeces = $bacteriologiefeces;

        return $this;
    }

    /**
     * Get bacteriologiefeces
     *
     * @return \VetBundle\Entity\BacteriologieFeces
     */
    public function getBacteriologiefeces()
    {
        return $this->bacteriologiefeces;
    }

    /**
     * Set bacteriologielaitmammite
     *
     * @param \VetBundle\Entity\BacteriologieLaitMammite $bacteriologielaitmammite
     *
     * @return Antibiogramme
     */
    public function setBacteriologielaitmammite(\VetBundle\Entity\BacteriologieLaitMammite $bacteriologielaitmammite = null)
    {
        $this->bacteriologielaitmammite = $bacteriologielaitmammite;

        return $this;
    }

    /**
     * Get bacteriologielaitmammite
     *
     * @return \VetBundle\Entity\BacteriologieLaitMammite
     */
    public function getBacteriologielaitmammite()
    {
        return $this->bacteriologielaitmammite;
    }

    /**
     * Set comptagecellulaire
     *
     * @param \VetBundle\Entity\ComptageCellulaire $comptagecellulaire
     *
     * @return Antibiogramme
     */
    public function setComptagecellulaire(\VetBundle\Entity\ComptageCellulaire $comptagecellulaire = null)
    {
        $this->comptagecellulaire = $comptagecellulaire;

        return $this;
    }

    /**
     * Get comptagecellulaire
     *
     * @return \VetBundle\Entity\ComptageCellulaire
     */
    public function getComptagecellulaire()
    {
        return $this->comptagecellulaire;
    }

    /**
     * Set inhibiteurslait
     *
     * @param \VetBundle\Entity\InhibiteursLait $inhibiteurslait
     *
     * @return Antibiogramme
     */
    public function setInhibiteurslait(\VetBundle\Entity\InhibiteursLait $inhibiteurslait = null)
    {
        $this->inhibiteurslait = $inhibiteurslait;

        return $this;
    }

    /**
     * Get inhibiteurslait
     *
     * @return \VetBundle\Entity\InhibiteursLait
     */
    public function getInhibiteurslait()
    {
        return $this->inhibiteurslait;
    }

    /**
     * Set parasitologie
     *
     * @param \VetBundle\Entity\Parasitologie $parasitologie
     *
     * @return Antibiogramme
     */
    public function setParasitologie(\VetBundle\Entity\Parasitologie $parasitologie = null)
    {
        $this->parasitologie = $parasitologie;

        return $this;
    }

    /**
     * Get parasitologie
     *
     * @return \VetBundle\Entity\Parasitologie
     */
    public function getParasitologie()
    {
        return $this->parasitologie;
    }

    /**
     * Set pcr
     *
     * @param \VetBundle\Entity\PCR $pcr
     *
     * @return Antibiogramme
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
     * Set serologie
     *
     * @param \VetBundle\Entity\Serologie $serologie
     *
     * @return Antibiogramme
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

    /**
     * Set virologieautresorganes
     *
     * @param \VetBundle\Entity\VirologieAutresOrganes $virologieautresorganes
     *
     * @return Antibiogramme
     */
    public function setVirologieautresorganes(\VetBundle\Entity\VirologieAutresOrganes $virologieautresorganes = null)
    {
        $this->virologieautresorganes = $virologieautresorganes;

        return $this;
    }

    /**
     * Get virologieautresorganes
     *
     * @return \VetBundle\Entity\VirologieAutresOrganes
     */
    public function getVirologieautresorganes()
    {
        return $this->virologieautresorganes;
    }

    /**
     * Set virologiefeces
     *
     * @param \VetBundle\Entity\VirologieFeces $virologiefeces
     *
     * @return Antibiogramme
     */
    public function setVirologiefeces(\VetBundle\Entity\VirologieFeces $virologiefeces = null)
    {
        $this->virologiefeces = $virologiefeces;

        return $this;
    }

    /**
     * Get virologiefeces
     *
     * @return \VetBundle\Entity\VirologieFeces
     */
    public function getVirologiefeces()
    {
        return $this->virologiefeces;
    }
}
