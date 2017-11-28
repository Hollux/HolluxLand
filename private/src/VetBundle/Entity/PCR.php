<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PCR
 * @ORM\Table(name="vet_anabel_pcr")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\PCRRepository")
 */
class PCR
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
     * @ORM\OneToOne(targetEntity="Avortement", mappedBy="pcr", cascade={"persist", "remove"})
     */
    private $avortement;

    /**
     * @var string
     *
     * @ORM\Column(name="pcrbrucella", type="string", length=255, nullable=true)
     */
    private $pcrbrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodebrucella", type="string", length=255, nullable=true)
     */
    private $pcrmethodebrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcridentificationbrucella", type="string", length=255, nullable=true)
     */
    private $pcridentificationbrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifbrucella", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifbrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrbvd", type="string", length=255, nullable=true)
     */
    private $pcrbvd;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodebvd", type="string", length=255, nullable=true)
     */
    private $pcrmethodebvd;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifbvd", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifbvd;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrchlamydia", type="string", length=255, nullable=true)
     */
    private $pcrchlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodechlamydia", type="string", length=255, nullable=true)
     */
    private $pcrmethodechlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcridentificationchlamydia", type="string", length=255, nullable=true)
     */
    private $pcridentificationchlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifchlamydia", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifchlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrcoxiellaburnetii", type="string", length=255, nullable=true)
     */
    private $pcrcoxiellaburnetii;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodecoxiellaburnetii", type="string", length=255, nullable=true)
     */
    private $pcrmethodecoxiellaburnetii;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifcoxiellaburnetii", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifcoxiellaburnetii;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcribr", type="string", length=255, nullable=true)
     */
    private $pcribr;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodeibr", type="string", length=255, nullable=true)
     */
    private $pcrmethodeibr;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifibr", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifibr;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrleptospira", type="string", length=255, nullable=true)
     */
    private $pcrleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodeleptospira", type="string", length=255, nullable=true)
     */
    private $pcrmethodeleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcridentificationleptospira", type="string", length=255, nullable=true)
     */
    private $pcridentificationleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifleptospira", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrleucose", type="string", length=255, nullable=true)
     */
    private $pcrleucose;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodeleucose", type="string", length=255, nullable=true)
     */
    private $pcrmethodeleucose;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifleucose", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifleucose;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrneospora", type="string", length=255, nullable=true)
     */
    private $pcrneospora;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrmethodeneospora", type="string", length=255, nullable=true)
     */
    private $pcrmethodeneospora;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrresultatquantitatifneospora", type="string", length=255, nullable=true)
     */
    private $pcrresultatquantitatifneospora;
    

    /**
     * @var string
     *
     * @ORM\Column(name="pcrautrepcr", type="string", length=255, nullable=true)
     */
    private $pcrautrepcr;
    

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
     * Set pcrbrucella
     *
     * @param string $pcrbrucella
     *
     * @return PCR
     */
    public function setPcrbrucella($pcrbrucella)
    {
        $this->pcrbrucella = $pcrbrucella;

        return $this;
    }

    /**
     * Get pcrbrucella
     *
     * @return string
     */
    public function getPcrbrucella()
    {
        return $this->pcrbrucella;
    }

    /**
     * Set pcrmethodebrucella
     *
     * @param string $pcrmethodebrucella
     *
     * @return PCR
     */
    public function setPcrmethodebrucella($pcrmethodebrucella)
    {
        $this->pcrmethodebrucella = $pcrmethodebrucella;

        return $this;
    }

    /**
     * Get pcrmethodebrucella
     *
     * @return string
     */
    public function getPcrmethodebrucella()
    {
        return $this->pcrmethodebrucella;
    }

    /**
     * Set pcridentificationbrucella
     *
     * @param string $pcridentificationbrucella
     *
     * @return PCR
     */
    public function setPcridentificationbrucella($pcridentificationbrucella)
    {
        $this->pcridentificationbrucella = $pcridentificationbrucella;

        return $this;
    }

    /**
     * Get pcridentificationbrucella
     *
     * @return string
     */
    public function getPcridentificationbrucella()
    {
        return $this->pcridentificationbrucella;
    }

    /**
     * Set pcrresultatquantitatifbrucella
     *
     * @param string $pcrresultatquantitatifbrucella
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifbrucella($pcrresultatquantitatifbrucella)
    {
        $this->pcrresultatquantitatifbrucella = $pcrresultatquantitatifbrucella;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifbrucella
     *
     * @return string
     */
    public function getPcrresultatquantitatifbrucella()
    {
        return $this->pcrresultatquantitatifbrucella;
    }

    /**
     * Set pcrbvd
     *
     * @param string $pcrbvd
     *
     * @return PCR
     */
    public function setPcrbvd($pcrbvd)
    {
        $this->pcrbvd = $pcrbvd;

        return $this;
    }

    /**
     * Get pcrbvd
     *
     * @return string
     */
    public function getPcrbvd()
    {
        return $this->pcrbvd;
    }

    /**
     * Set pcrmethodebvd
     *
     * @param string $pcrmethodebvd
     *
     * @return PCR
     */
    public function setPcrmethodebvd($pcrmethodebvd)
    {
        $this->pcrmethodebvd = $pcrmethodebvd;

        return $this;
    }

    /**
     * Get pcrmethodebvd
     *
     * @return string
     */
    public function getPcrmethodebvd()
    {
        return $this->pcrmethodebvd;
    }

    /**
     * Set pcrresultatquantitatifbvd
     *
     * @param string $pcrresultatquantitatifbvd
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifbvd($pcrresultatquantitatifbvd)
    {
        $this->pcrresultatquantitatifbvd = $pcrresultatquantitatifbvd;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifbvd
     *
     * @return string
     */
    public function getPcrresultatquantitatifbvd()
    {
        return $this->pcrresultatquantitatifbvd;
    }

    /**
     * Set pcrchlamydia
     *
     * @param string $pcrchlamydia
     *
     * @return PCR
     */
    public function setPcrchlamydia($pcrchlamydia)
    {
        $this->pcrchlamydia = $pcrchlamydia;

        return $this;
    }

    /**
     * Get pcrchlamydia
     *
     * @return string
     */
    public function getPcrchlamydia()
    {
        return $this->pcrchlamydia;
    }

    /**
     * Set pcrmethodechlamydia
     *
     * @param string $pcrmethodechlamydia
     *
     * @return PCR
     */
    public function setPcrmethodechlamydia($pcrmethodechlamydia)
    {
        $this->pcrmethodechlamydia = $pcrmethodechlamydia;

        return $this;
    }

    /**
     * Get pcrmethodechlamydia
     *
     * @return string
     */
    public function getPcrmethodechlamydia()
    {
        return $this->pcrmethodechlamydia;
    }

    /**
     * Set pcridentificationchlamydia
     *
     * @param string $pcridentificationchlamydia
     *
     * @return PCR
     */
    public function setPcridentificationchlamydia($pcridentificationchlamydia)
    {
        $this->pcridentificationchlamydia = $pcridentificationchlamydia;

        return $this;
    }

    /**
     * Get pcridentificationchlamydia
     *
     * @return string
     */
    public function getPcridentificationchlamydia()
    {
        return $this->pcridentificationchlamydia;
    }

    /**
     * Set pcrresultatquantitatifchlamydia
     *
     * @param string $pcrresultatquantitatifchlamydia
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifchlamydia($pcrresultatquantitatifchlamydia)
    {
        $this->pcrresultatquantitatifchlamydia = $pcrresultatquantitatifchlamydia;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifchlamydia
     *
     * @return string
     */
    public function getPcrresultatquantitatifchlamydia()
    {
        return $this->pcrresultatquantitatifchlamydia;
    }

    /**
     * Set pcrcoxiellaburnetii
     *
     * @param string $pcrcoxiellaburnetii
     *
     * @return PCR
     */
    public function setPcrcoxiellaburnetii($pcrcoxiellaburnetii)
    {
        $this->pcrcoxiellaburnetii = $pcrcoxiellaburnetii;

        return $this;
    }

    /**
     * Get pcrcoxiellaburnetii
     *
     * @return string
     */
    public function getPcrcoxiellaburnetii()
    {
        return $this->pcrcoxiellaburnetii;
    }

    /**
     * Set pcrmethodecoxiellaburnetii
     *
     * @param string $pcrmethodecoxiellaburnetii
     *
     * @return PCR
     */
    public function setPcrmethodecoxiellaburnetii($pcrmethodecoxiellaburnetii)
    {
        $this->pcrmethodecoxiellaburnetii = $pcrmethodecoxiellaburnetii;

        return $this;
    }

    /**
     * Get pcrmethodecoxiellaburnetii
     *
     * @return string
     */
    public function getPcrmethodecoxiellaburnetii()
    {
        return $this->pcrmethodecoxiellaburnetii;
    }

    /**
     * Set pcrresultatquantitatifcoxiellaburnetii
     *
     * @param string $pcrresultatquantitatifcoxiellaburnetii
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifcoxiellaburnetii($pcrresultatquantitatifcoxiellaburnetii)
    {
        $this->pcrresultatquantitatifcoxiellaburnetii = $pcrresultatquantitatifcoxiellaburnetii;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifcoxiellaburnetii
     *
     * @return string
     */
    public function getPcrresultatquantitatifcoxiellaburnetii()
    {
        return $this->pcrresultatquantitatifcoxiellaburnetii;
    }

    /**
     * Set pcribr
     *
     * @param string $pcribr
     *
     * @return PCR
     */
    public function setPcribr($pcribr)
    {
        $this->pcribr = $pcribr;

        return $this;
    }

    /**
     * Get pcribr
     *
     * @return string
     */
    public function getPcribr()
    {
        return $this->pcribr;
    }

    /**
     * Set pcrmethodeibr
     *
     * @param string $pcrmethodeibr
     *
     * @return PCR
     */
    public function setPcrmethodeibr($pcrmethodeibr)
    {
        $this->pcrmethodeibr = $pcrmethodeibr;

        return $this;
    }

    /**
     * Get pcrmethodeibr
     *
     * @return string
     */
    public function getPcrmethodeibr()
    {
        return $this->pcrmethodeibr;
    }

    /**
     * Set pcrresultatquantitatifibr
     *
     * @param string $pcrresultatquantitatifibr
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifibr($pcrresultatquantitatifibr)
    {
        $this->pcrresultatquantitatifibr = $pcrresultatquantitatifibr;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifibr
     *
     * @return string
     */
    public function getPcrresultatquantitatifibr()
    {
        return $this->pcrresultatquantitatifibr;
    }

    /**
     * Set pcrleptospira
     *
     * @param string $pcrleptospira
     *
     * @return PCR
     */
    public function setPcrleptospira($pcrleptospira)
    {
        $this->pcrleptospira = $pcrleptospira;

        return $this;
    }

    /**
     * Get pcrleptospira
     *
     * @return string
     */
    public function getPcrleptospira()
    {
        return $this->pcrleptospira;
    }

    /**
     * Set pcrmethodeleptospira
     *
     * @param string $pcrmethodeleptospira
     *
     * @return PCR
     */
    public function setPcrmethodeleptospira($pcrmethodeleptospira)
    {
        $this->pcrmethodeleptospira = $pcrmethodeleptospira;

        return $this;
    }

    /**
     * Get pcrmethodeleptospira
     *
     * @return string
     */
    public function getPcrmethodeleptospira()
    {
        return $this->pcrmethodeleptospira;
    }

    /**
     * Set pcridentificationleptospira
     *
     * @param string $pcridentificationleptospira
     *
     * @return PCR
     */
    public function setPcridentificationleptospira($pcridentificationleptospira)
    {
        $this->pcridentificationleptospira = $pcridentificationleptospira;

        return $this;
    }

    /**
     * Get pcridentificationleptospira
     *
     * @return string
     */
    public function getPcridentificationleptospira()
    {
        return $this->pcridentificationleptospira;
    }

    /**
     * Set pcrresultatquantitatifleptospira
     *
     * @param string $pcrresultatquantitatifleptospira
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifleptospira($pcrresultatquantitatifleptospira)
    {
        $this->pcrresultatquantitatifleptospira = $pcrresultatquantitatifleptospira;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifleptospira
     *
     * @return string
     */
    public function getPcrresultatquantitatifleptospira()
    {
        return $this->pcrresultatquantitatifleptospira;
    }

    /**
     * Set pcrleucose
     *
     * @param string $pcrleucose
     *
     * @return PCR
     */
    public function setPcrleucose($pcrleucose)
    {
        $this->pcrleucose = $pcrleucose;

        return $this;
    }

    /**
     * Get pcrleucose
     *
     * @return string
     */
    public function getPcrleucose()
    {
        return $this->pcrleucose;
    }

    /**
     * Set pcrmethodeleucose
     *
     * @param string $pcrmethodeleucose
     *
     * @return PCR
     */
    public function setPcrmethodeleucose($pcrmethodeleucose)
    {
        $this->pcrmethodeleucose = $pcrmethodeleucose;

        return $this;
    }

    /**
     * Get pcrmethodeleucose
     *
     * @return string
     */
    public function getPcrmethodeleucose()
    {
        return $this->pcrmethodeleucose;
    }

    /**
     * Set pcrresultatquantitatifleucose
     *
     * @param string $pcrresultatquantitatifleucose
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifleucose($pcrresultatquantitatifleucose)
    {
        $this->pcrresultatquantitatifleucose = $pcrresultatquantitatifleucose;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifleucose
     *
     * @return string
     */
    public function getPcrresultatquantitatifleucose()
    {
        return $this->pcrresultatquantitatifleucose;
    }

    /**
     * Set pcrneospora
     *
     * @param string $pcrneospora
     *
     * @return PCR
     */
    public function setPcrneospora($pcrneospora)
    {
        $this->pcrneospora = $pcrneospora;

        return $this;
    }

    /**
     * Get pcrneospora
     *
     * @return string
     */
    public function getPcrneospora()
    {
        return $this->pcrneospora;
    }

    /**
     * Set pcrmethodeneospora
     *
     * @param string $pcrmethodeneospora
     *
     * @return PCR
     */
    public function setPcrmethodeneospora($pcrmethodeneospora)
    {
        $this->pcrmethodeneospora = $pcrmethodeneospora;

        return $this;
    }

    /**
     * Get pcrmethodeneospora
     *
     * @return string
     */
    public function getPcrmethodeneospora()
    {
        return $this->pcrmethodeneospora;
    }

    /**
     * Set pcrresultatquantitatifneospora
     *
     * @param string $pcrresultatquantitatifneospora
     *
     * @return PCR
     */
    public function setPcrresultatquantitatifneospora($pcrresultatquantitatifneospora)
    {
        $this->pcrresultatquantitatifneospora = $pcrresultatquantitatifneospora;

        return $this;
    }

    /**
     * Get pcrresultatquantitatifneospora
     *
     * @return string
     */
    public function getPcrresultatquantitatifneospora()
    {
        return $this->pcrresultatquantitatifneospora;
    }

    /**
     * Set pcrautrepcr
     *
     * @param string $pcrautrepcr
     *
     * @return PCR
     */
    public function setPcrautrepcr($pcrautrepcr)
    {
        $this->pcrautrepcr = $pcrautrepcr;

        return $this;
    }

    /**
     * Get pcrautrepcr
     *
     * @return string
     */
    public function getPcrautrepcr()
    {
        return $this->pcrautrepcr;
    }

    /**
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return PCR
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
