<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serologie
 * @ORM\Table(name="vet_anabel_serologie")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\SerologieRepository")
 */
class Serologie
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
     * @ORM\OneToOne(targetEntity="Avortement", mappedBy="serologie", cascade={"persist", "remove"})
     */
    private $avortement;

    /**
     * @var string
     *
     * @ORM\Column(name="serologieadenovirus", type="string", length=255, nullable=true)
     */
    private $serologieadenovirus;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodeadenovirus", type="string", length=255, nullable=true)
     */
    private $serologiemethodeadenovirus;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologietypageadenovirus", type="string", length=255, nullable=true)
     */
    private $serologietypageadenovirus;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifadenovirus", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifadenovirus;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieanaplasma", type="string", length=255, nullable=true)
     */
    private $serologieanaplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodeanaplasma", type="string", length=255, nullable=true)
     */
    private $serologiemethodeanaplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieidentificationanaplasma", type="string", length=255, nullable=true)
     */
    private $serologieidentificationanaplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifanaplasma", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifanaplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiebesnoitiabesnoiti", type="string", length=255, nullable=true)
     */
    private $serologiebesnoitiabesnoiti;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodebesnoitiabesnoiti", type="string", length=255, nullable=true)
     */
    private $serologiemethodebesnoitiabesnoiti;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifbesnoitiabesnoiti", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifbesnoitiabesnoiti;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiebrucella", type="string", length=255, nullable=true)
     */
    private $serologiebrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodebrucella", type="string", length=255, nullable=true)
     */
    private $serologiemethodebrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieidentificationbrucella", type="string", length=255, nullable=true)
     */
    private $serologieidentificationbrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifbrucella", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifbrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiebvd", type="string", length=255, nullable=true)
     */
    private $serologiebvd;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodebvd", type="string", length=255, nullable=true)
     */
    private $serologiemethodebvd;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifbvd", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifbvd;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiechlamydia", type="string", length=255, nullable=true)
     */
    private $serologiechlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodechlamydia", type="string", length=255, nullable=true)
     */
    private $serologiemethodechlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieidentificationchlamydia", type="string", length=255, nullable=true)
     */
    private $serologieidentificationchlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifchlamydia", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifchlamydia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiechlamydophila", type="string", length=255, nullable=true)
     */
    private $serologiechlamydophila;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodechlamydophila", type="string", length=255, nullable=true)
     */
    private $serologiemethodechlamydophila;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieidentificationchlamydophila", type="string", length=255, nullable=true)
     */
    private $serologieidentificationchlamydophila;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifchlamydophila", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifchlamydophila;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiecoxiellaburnetii", type="string", length=255, nullable=true)
     */
    private $serologiecoxiellaburnetii;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodecoxiellaburnetii", type="string", length=255, nullable=true)
     */
    private $serologiemethodecoxiellaburnetii;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifcoxiellaburnetii", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifcoxiellaburnetii;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieerlichia", type="string", length=255, nullable=true)
     */
    private $serologieerlichia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodeerlichia", type="string", length=255, nullable=true)
     */
    private $serologiemethodeerlichia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatiferlichia", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatiferlichia;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiefco", type="string", length=255, nullable=true)
     */
    private $serologiefco;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodefco", type="string", length=255, nullable=true)
     */
    private $serologiemethodefco;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologietypage1fco", type="string", length=255, nullable=true)
     */
    private $serologietypage1fco;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatif1fco", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatif1fco;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologietypage2fco", type="string", length=255, nullable=true)
     */
    private $serologietypage2fco;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatif2fco", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatif2fco;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieibr", type="string", length=255, nullable=true)
     */
    private $serologieibr;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodeibr", type="string", length=255, nullable=true)
     */
    private $serologiemethodeibr;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifibr", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifibr;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieleptospira", type="string", length=255, nullable=true)
     */
    private $serologieleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodeleptospira", type="string", length=255, nullable=true)
     */
    private $serologiemethodeleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieidentificationleptospira", type="string", length=255, nullable=true)
     */
    private $serologieidentificationleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifleptospira", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifleptospira;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemycoplasma", type="string", length=255, nullable=true)
     */
    private $serologiemycoplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodemycoplasma", type="string", length=255, nullable=true)
     */
    private $serologiemethodemycoplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieidentificationmycoplasma", type="string", length=255, nullable=true)
     */
    private $serologieidentificationmycoplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifmycoplasma", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifmycoplasma;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieneospora", type="string", length=255, nullable=true)
     */
    private $serologieneospora;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodeneospora", type="string", length=255, nullable=true)
     */
    private $serologiemethodeneospora;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifneospora", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifneospora;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieparainfluenzapi3", type="string", length=255, nullable=true)
     */
    private $serologieparainfluenzapi3;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodeparainfluenzapi3", type="string", length=255, nullable=true)
     */
    private $serologiemethodeparainfluenzapi3;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifparainfluenzapi3", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifparainfluenzapi3;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiersv", type="string", length=255, nullable=true)
     */
    private $serologiersv;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodersv", type="string", length=255, nullable=true)
     */
    private $serologiemethodersv;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifrsv", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifrsv;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologievisnamaedi", type="string", length=255, nullable=true)
     */
    private $serologievisnamaedi;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologiemethodevisnamaedi", type="string", length=255, nullable=true)
     */
    private $serologiemethodevisnamaedi;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieresultatquantitatifvisnamaedi", type="string", length=255, nullable=true)
     */
    private $serologieresultatquantitatifvisnamaedi;
    

    /**
     * @var string
     *
     * @ORM\Column(name="serologieautrepcr", type="string", length=255, nullable=true)
     */
    private $serologieautrepcr;
    

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
     * Set serologieadenovirus
     *
     * @param string $serologieadenovirus
     *
     * @return Serologie
     */
    public function setSerologieadenovirus($serologieadenovirus)
    {
        $this->serologieadenovirus = $serologieadenovirus;

        return $this;
    }

    /**
     * Get serologieadenovirus
     *
     * @return string
     */
    public function getSerologieadenovirus()
    {
        return $this->serologieadenovirus;
    }

    /**
     * Set serologiemethodeadenovirus
     *
     * @param string $serologiemethodeadenovirus
     *
     * @return Serologie
     */
    public function setSerologiemethodeadenovirus($serologiemethodeadenovirus)
    {
        $this->serologiemethodeadenovirus = $serologiemethodeadenovirus;

        return $this;
    }

    /**
     * Get serologiemethodeadenovirus
     *
     * @return string
     */
    public function getSerologiemethodeadenovirus()
    {
        return $this->serologiemethodeadenovirus;
    }

    /**
     * Set serologietypageadenovirus
     *
     * @param string $serologietypageadenovirus
     *
     * @return Serologie
     */
    public function setSerologietypageadenovirus($serologietypageadenovirus)
    {
        $this->serologietypageadenovirus = $serologietypageadenovirus;

        return $this;
    }

    /**
     * Get serologietypageadenovirus
     *
     * @return string
     */
    public function getSerologietypageadenovirus()
    {
        return $this->serologietypageadenovirus;
    }

    /**
     * Set serologieresultatquantitatifadenovirus
     *
     * @param string $serologieresultatquantitatifadenovirus
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifadenovirus($serologieresultatquantitatifadenovirus)
    {
        $this->serologieresultatquantitatifadenovirus = $serologieresultatquantitatifadenovirus;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifadenovirus
     *
     * @return string
     */
    public function getSerologieresultatquantitatifadenovirus()
    {
        return $this->serologieresultatquantitatifadenovirus;
    }

    /**
     * Set serologieanaplasma
     *
     * @param string $serologieanaplasma
     *
     * @return Serologie
     */
    public function setSerologieanaplasma($serologieanaplasma)
    {
        $this->serologieanaplasma = $serologieanaplasma;

        return $this;
    }

    /**
     * Get serologieanaplasma
     *
     * @return string
     */
    public function getSerologieanaplasma()
    {
        return $this->serologieanaplasma;
    }

    /**
     * Set serologiemethodeanaplasma
     *
     * @param string $serologiemethodeanaplasma
     *
     * @return Serologie
     */
    public function setSerologiemethodeanaplasma($serologiemethodeanaplasma)
    {
        $this->serologiemethodeanaplasma = $serologiemethodeanaplasma;

        return $this;
    }

    /**
     * Get serologiemethodeanaplasma
     *
     * @return string
     */
    public function getSerologiemethodeanaplasma()
    {
        return $this->serologiemethodeanaplasma;
    }

    /**
     * Set serologieidentificationanaplasma
     *
     * @param string $serologieidentificationanaplasma
     *
     * @return Serologie
     */
    public function setSerologieidentificationanaplasma($serologieidentificationanaplasma)
    {
        $this->serologieidentificationanaplasma = $serologieidentificationanaplasma;

        return $this;
    }

    /**
     * Get serologieidentificationanaplasma
     *
     * @return string
     */
    public function getSerologieidentificationanaplasma()
    {
        return $this->serologieidentificationanaplasma;
    }

    /**
     * Set serologieresultatquantitatifanaplasma
     *
     * @param string $serologieresultatquantitatifanaplasma
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifanaplasma($serologieresultatquantitatifanaplasma)
    {
        $this->serologieresultatquantitatifanaplasma = $serologieresultatquantitatifanaplasma;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifanaplasma
     *
     * @return string
     */
    public function getSerologieresultatquantitatifanaplasma()
    {
        return $this->serologieresultatquantitatifanaplasma;
    }

    /**
     * Set serologiebesnoitiabesnoiti
     *
     * @param string $serologiebesnoitiabesnoiti
     *
     * @return Serologie
     */
    public function setSerologiebesnoitiabesnoiti($serologiebesnoitiabesnoiti)
    {
        $this->serologiebesnoitiabesnoiti = $serologiebesnoitiabesnoiti;

        return $this;
    }

    /**
     * Get serologiebesnoitiabesnoiti
     *
     * @return string
     */
    public function getSerologiebesnoitiabesnoiti()
    {
        return $this->serologiebesnoitiabesnoiti;
    }

    /**
     * Set serologiemethodebesnoitiabesnoiti
     *
     * @param string $serologiemethodebesnoitiabesnoiti
     *
     * @return Serologie
     */
    public function setSerologiemethodebesnoitiabesnoiti($serologiemethodebesnoitiabesnoiti)
    {
        $this->serologiemethodebesnoitiabesnoiti = $serologiemethodebesnoitiabesnoiti;

        return $this;
    }

    /**
     * Get serologiemethodebesnoitiabesnoiti
     *
     * @return string
     */
    public function getSerologiemethodebesnoitiabesnoiti()
    {
        return $this->serologiemethodebesnoitiabesnoiti;
    }

    /**
     * Set serologieresultatquantitatifbesnoitiabesnoiti
     *
     * @param string $serologieresultatquantitatifbesnoitiabesnoiti
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifbesnoitiabesnoiti($serologieresultatquantitatifbesnoitiabesnoiti)
    {
        $this->serologieresultatquantitatifbesnoitiabesnoiti = $serologieresultatquantitatifbesnoitiabesnoiti;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifbesnoitiabesnoiti
     *
     * @return string
     */
    public function getSerologieresultatquantitatifbesnoitiabesnoiti()
    {
        return $this->serologieresultatquantitatifbesnoitiabesnoiti;
    }

    /**
     * Set serologiebrucella
     *
     * @param string $serologiebrucella
     *
     * @return Serologie
     */
    public function setSerologiebrucella($serologiebrucella)
    {
        $this->serologiebrucella = $serologiebrucella;

        return $this;
    }

    /**
     * Get serologiebrucella
     *
     * @return string
     */
    public function getSerologiebrucella()
    {
        return $this->serologiebrucella;
    }

    /**
     * Set serologiemethodebrucella
     *
     * @param string $serologiemethodebrucella
     *
     * @return Serologie
     */
    public function setSerologiemethodebrucella($serologiemethodebrucella)
    {
        $this->serologiemethodebrucella = $serologiemethodebrucella;

        return $this;
    }

    /**
     * Get serologiemethodebrucella
     *
     * @return string
     */
    public function getSerologiemethodebrucella()
    {
        return $this->serologiemethodebrucella;
    }

    /**
     * Set serologieidentificationbrucella
     *
     * @param string $serologieidentificationbrucella
     *
     * @return Serologie
     */
    public function setSerologieidentificationbrucella($serologieidentificationbrucella)
    {
        $this->serologieidentificationbrucella = $serologieidentificationbrucella;

        return $this;
    }

    /**
     * Get serologieidentificationbrucella
     *
     * @return string
     */
    public function getSerologieidentificationbrucella()
    {
        return $this->serologieidentificationbrucella;
    }

    /**
     * Set serologieresultatquantitatifbrucella
     *
     * @param string $serologieresultatquantitatifbrucella
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifbrucella($serologieresultatquantitatifbrucella)
    {
        $this->serologieresultatquantitatifbrucella = $serologieresultatquantitatifbrucella;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifbrucella
     *
     * @return string
     */
    public function getSerologieresultatquantitatifbrucella()
    {
        return $this->serologieresultatquantitatifbrucella;
    }

    /**
     * Set serologiebvd
     *
     * @param string $serologiebvd
     *
     * @return Serologie
     */
    public function setSerologiebvd($serologiebvd)
    {
        $this->serologiebvd = $serologiebvd;

        return $this;
    }

    /**
     * Get serologiebvd
     *
     * @return string
     */
    public function getSerologiebvd()
    {
        return $this->serologiebvd;
    }

    /**
     * Set serologiemethodebvd
     *
     * @param string $serologiemethodebvd
     *
     * @return Serologie
     */
    public function setSerologiemethodebvd($serologiemethodebvd)
    {
        $this->serologiemethodebvd = $serologiemethodebvd;

        return $this;
    }

    /**
     * Get serologiemethodebvd
     *
     * @return string
     */
    public function getSerologiemethodebvd()
    {
        return $this->serologiemethodebvd;
    }

    /**
     * Set serologieresultatquantitatifbvd
     *
     * @param string $serologieresultatquantitatifbvd
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifbvd($serologieresultatquantitatifbvd)
    {
        $this->serologieresultatquantitatifbvd = $serologieresultatquantitatifbvd;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifbvd
     *
     * @return string
     */
    public function getSerologieresultatquantitatifbvd()
    {
        return $this->serologieresultatquantitatifbvd;
    }

    /**
     * Set serologiechlamydia
     *
     * @param string $serologiechlamydia
     *
     * @return Serologie
     */
    public function setSerologiechlamydia($serologiechlamydia)
    {
        $this->serologiechlamydia = $serologiechlamydia;

        return $this;
    }

    /**
     * Get serologiechlamydia
     *
     * @return string
     */
    public function getSerologiechlamydia()
    {
        return $this->serologiechlamydia;
    }

    /**
     * Set serologiemethodechlamydia
     *
     * @param string $serologiemethodechlamydia
     *
     * @return Serologie
     */
    public function setSerologiemethodechlamydia($serologiemethodechlamydia)
    {
        $this->serologiemethodechlamydia = $serologiemethodechlamydia;

        return $this;
    }

    /**
     * Get serologiemethodechlamydia
     *
     * @return string
     */
    public function getSerologiemethodechlamydia()
    {
        return $this->serologiemethodechlamydia;
    }

    /**
     * Set serologieidentificationchlamydia
     *
     * @param string $serologieidentificationchlamydia
     *
     * @return Serologie
     */
    public function setSerologieidentificationchlamydia($serologieidentificationchlamydia)
    {
        $this->serologieidentificationchlamydia = $serologieidentificationchlamydia;

        return $this;
    }

    /**
     * Get serologieidentificationchlamydia
     *
     * @return string
     */
    public function getSerologieidentificationchlamydia()
    {
        return $this->serologieidentificationchlamydia;
    }

    /**
     * Set serologieresultatquantitatifchlamydia
     *
     * @param string $serologieresultatquantitatifchlamydia
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifchlamydia($serologieresultatquantitatifchlamydia)
    {
        $this->serologieresultatquantitatifchlamydia = $serologieresultatquantitatifchlamydia;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifchlamydia
     *
     * @return string
     */
    public function getSerologieresultatquantitatifchlamydia()
    {
        return $this->serologieresultatquantitatifchlamydia;
    }

    /**
     * Set serologiechlamydophila
     *
     * @param string $serologiechlamydophila
     *
     * @return Serologie
     */
    public function setSerologiechlamydophila($serologiechlamydophila)
    {
        $this->serologiechlamydophila = $serologiechlamydophila;

        return $this;
    }

    /**
     * Get serologiechlamydophila
     *
     * @return string
     */
    public function getSerologiechlamydophila()
    {
        return $this->serologiechlamydophila;
    }

    /**
     * Set serologiemethodechlamydophila
     *
     * @param string $serologiemethodechlamydophila
     *
     * @return Serologie
     */
    public function setSerologiemethodechlamydophila($serologiemethodechlamydophila)
    {
        $this->serologiemethodechlamydophila = $serologiemethodechlamydophila;

        return $this;
    }

    /**
     * Get serologiemethodechlamydophila
     *
     * @return string
     */
    public function getSerologiemethodechlamydophila()
    {
        return $this->serologiemethodechlamydophila;
    }

    /**
     * Set serologieidentificationchlamydophila
     *
     * @param string $serologieidentificationchlamydophila
     *
     * @return Serologie
     */
    public function setSerologieidentificationchlamydophila($serologieidentificationchlamydophila)
    {
        $this->serologieidentificationchlamydophila = $serologieidentificationchlamydophila;

        return $this;
    }

    /**
     * Get serologieidentificationchlamydophila
     *
     * @return string
     */
    public function getSerologieidentificationchlamydophila()
    {
        return $this->serologieidentificationchlamydophila;
    }

    /**
     * Set serologieresultatquantitatifchlamydophila
     *
     * @param string $serologieresultatquantitatifchlamydophila
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifchlamydophila($serologieresultatquantitatifchlamydophila)
    {
        $this->serologieresultatquantitatifchlamydophila = $serologieresultatquantitatifchlamydophila;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifchlamydophila
     *
     * @return string
     */
    public function getSerologieresultatquantitatifchlamydophila()
    {
        return $this->serologieresultatquantitatifchlamydophila;
    }

    /**
     * Set serologiecoxiellaburnetii
     *
     * @param string $serologiecoxiellaburnetii
     *
     * @return Serologie
     */
    public function setSerologiecoxiellaburnetii($serologiecoxiellaburnetii)
    {
        $this->serologiecoxiellaburnetii = $serologiecoxiellaburnetii;

        return $this;
    }

    /**
     * Get serologiecoxiellaburnetii
     *
     * @return string
     */
    public function getSerologiecoxiellaburnetii()
    {
        return $this->serologiecoxiellaburnetii;
    }

    /**
     * Set serologiemethodecoxiellaburnetii
     *
     * @param string $serologiemethodecoxiellaburnetii
     *
     * @return Serologie
     */
    public function setSerologiemethodecoxiellaburnetii($serologiemethodecoxiellaburnetii)
    {
        $this->serologiemethodecoxiellaburnetii = $serologiemethodecoxiellaburnetii;

        return $this;
    }

    /**
     * Get serologiemethodecoxiellaburnetii
     *
     * @return string
     */
    public function getSerologiemethodecoxiellaburnetii()
    {
        return $this->serologiemethodecoxiellaburnetii;
    }

    /**
     * Set serologieresultatquantitatifcoxiellaburnetii
     *
     * @param string $serologieresultatquantitatifcoxiellaburnetii
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifcoxiellaburnetii($serologieresultatquantitatifcoxiellaburnetii)
    {
        $this->serologieresultatquantitatifcoxiellaburnetii = $serologieresultatquantitatifcoxiellaburnetii;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifcoxiellaburnetii
     *
     * @return string
     */
    public function getSerologieresultatquantitatifcoxiellaburnetii()
    {
        return $this->serologieresultatquantitatifcoxiellaburnetii;
    }

    /**
     * Set serologieerlichia
     *
     * @param string $serologieerlichia
     *
     * @return Serologie
     */
    public function setSerologieerlichia($serologieerlichia)
    {
        $this->serologieerlichia = $serologieerlichia;

        return $this;
    }

    /**
     * Get serologieerlichia
     *
     * @return string
     */
    public function getSerologieerlichia()
    {
        return $this->serologieerlichia;
    }

    /**
     * Set serologiemethodeerlichia
     *
     * @param string $serologiemethodeerlichia
     *
     * @return Serologie
     */
    public function setSerologiemethodeerlichia($serologiemethodeerlichia)
    {
        $this->serologiemethodeerlichia = $serologiemethodeerlichia;

        return $this;
    }

    /**
     * Get serologiemethodeerlichia
     *
     * @return string
     */
    public function getSerologiemethodeerlichia()
    {
        return $this->serologiemethodeerlichia;
    }

    /**
     * Set serologieresultatquantitatiferlichia
     *
     * @param string $serologieresultatquantitatiferlichia
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatiferlichia($serologieresultatquantitatiferlichia)
    {
        $this->serologieresultatquantitatiferlichia = $serologieresultatquantitatiferlichia;

        return $this;
    }

    /**
     * Get serologieresultatquantitatiferlichia
     *
     * @return string
     */
    public function getSerologieresultatquantitatiferlichia()
    {
        return $this->serologieresultatquantitatiferlichia;
    }

    /**
     * Set serologiefco
     *
     * @param string $serologiefco
     *
     * @return Serologie
     */
    public function setSerologiefco($serologiefco)
    {
        $this->serologiefco = $serologiefco;

        return $this;
    }

    /**
     * Get serologiefco
     *
     * @return string
     */
    public function getSerologiefco()
    {
        return $this->serologiefco;
    }

    /**
     * Set serologiemethodefco
     *
     * @param string $serologiemethodefco
     *
     * @return Serologie
     */
    public function setSerologiemethodefco($serologiemethodefco)
    {
        $this->serologiemethodefco = $serologiemethodefco;

        return $this;
    }

    /**
     * Get serologiemethodefco
     *
     * @return string
     */
    public function getSerologiemethodefco()
    {
        return $this->serologiemethodefco;
    }

    /**
     * Set serologietypage1fco
     *
     * @param string $serologietypage1fco
     *
     * @return Serologie
     */
    public function setSerologietypage1fco($serologietypage1fco)
    {
        $this->serologietypage1fco = $serologietypage1fco;

        return $this;
    }

    /**
     * Get serologietypage1fco
     *
     * @return string
     */
    public function getSerologietypage1fco()
    {
        return $this->serologietypage1fco;
    }

    /**
     * Set serologieresultatquantitatif1fco
     *
     * @param string $serologieresultatquantitatif1fco
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatif1fco($serologieresultatquantitatif1fco)
    {
        $this->serologieresultatquantitatif1fco = $serologieresultatquantitatif1fco;

        return $this;
    }

    /**
     * Get serologieresultatquantitatif1fco
     *
     * @return string
     */
    public function getSerologieresultatquantitatif1fco()
    {
        return $this->serologieresultatquantitatif1fco;
    }

    /**
     * Set serologietypage2fco
     *
     * @param string $serologietypage2fco
     *
     * @return Serologie
     */
    public function setSerologietypage2fco($serologietypage2fco)
    {
        $this->serologietypage2fco = $serologietypage2fco;

        return $this;
    }

    /**
     * Get serologietypage2fco
     *
     * @return string
     */
    public function getSerologietypage2fco()
    {
        return $this->serologietypage2fco;
    }

    /**
     * Set serologieresultatquantitatif2fco
     *
     * @param string $serologieresultatquantitatif2fco
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatif2fco($serologieresultatquantitatif2fco)
    {
        $this->serologieresultatquantitatif2fco = $serologieresultatquantitatif2fco;

        return $this;
    }

    /**
     * Get serologieresultatquantitatif2fco
     *
     * @return string
     */
    public function getSerologieresultatquantitatif2fco()
    {
        return $this->serologieresultatquantitatif2fco;
    }

    /**
     * Set serologieibr
     *
     * @param string $serologieibr
     *
     * @return Serologie
     */
    public function setSerologieibr($serologieibr)
    {
        $this->serologieibr = $serologieibr;

        return $this;
    }

    /**
     * Get serologieibr
     *
     * @return string
     */
    public function getSerologieibr()
    {
        return $this->serologieibr;
    }

    /**
     * Set serologiemethodeibr
     *
     * @param string $serologiemethodeibr
     *
     * @return Serologie
     */
    public function setSerologiemethodeibr($serologiemethodeibr)
    {
        $this->serologiemethodeibr = $serologiemethodeibr;

        return $this;
    }

    /**
     * Get serologiemethodeibr
     *
     * @return string
     */
    public function getSerologiemethodeibr()
    {
        return $this->serologiemethodeibr;
    }

    /**
     * Set serologieresultatquantitatifibr
     *
     * @param string $serologieresultatquantitatifibr
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifibr($serologieresultatquantitatifibr)
    {
        $this->serologieresultatquantitatifibr = $serologieresultatquantitatifibr;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifibr
     *
     * @return string
     */
    public function getSerologieresultatquantitatifibr()
    {
        return $this->serologieresultatquantitatifibr;
    }

    /**
     * Set serologieleptospira
     *
     * @param string $serologieleptospira
     *
     * @return Serologie
     */
    public function setSerologieleptospira($serologieleptospira)
    {
        $this->serologieleptospira = $serologieleptospira;

        return $this;
    }

    /**
     * Get serologieleptospira
     *
     * @return string
     */
    public function getSerologieleptospira()
    {
        return $this->serologieleptospira;
    }

    /**
     * Set serologiemethodeleptospira
     *
     * @param string $serologiemethodeleptospira
     *
     * @return Serologie
     */
    public function setSerologiemethodeleptospira($serologiemethodeleptospira)
    {
        $this->serologiemethodeleptospira = $serologiemethodeleptospira;

        return $this;
    }

    /**
     * Get serologiemethodeleptospira
     *
     * @return string
     */
    public function getSerologiemethodeleptospira()
    {
        return $this->serologiemethodeleptospira;
    }

    /**
     * Set serologieidentificationleptospira
     *
     * @param string $serologieidentificationleptospira
     *
     * @return Serologie
     */
    public function setSerologieidentificationleptospira($serologieidentificationleptospira)
    {
        $this->serologieidentificationleptospira = $serologieidentificationleptospira;

        return $this;
    }

    /**
     * Get serologieidentificationleptospira
     *
     * @return string
     */
    public function getSerologieidentificationleptospira()
    {
        return $this->serologieidentificationleptospira;
    }

    /**
     * Set serologieresultatquantitatifleptospira
     *
     * @param string $serologieresultatquantitatifleptospira
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifleptospira($serologieresultatquantitatifleptospira)
    {
        $this->serologieresultatquantitatifleptospira = $serologieresultatquantitatifleptospira;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifleptospira
     *
     * @return string
     */
    public function getSerologieresultatquantitatifleptospira()
    {
        return $this->serologieresultatquantitatifleptospira;
    }

    /**
     * Set serologiemycoplasma
     *
     * @param string $serologiemycoplasma
     *
     * @return Serologie
     */
    public function setSerologiemycoplasma($serologiemycoplasma)
    {
        $this->serologiemycoplasma = $serologiemycoplasma;

        return $this;
    }

    /**
     * Get serologiemycoplasma
     *
     * @return string
     */
    public function getSerologiemycoplasma()
    {
        return $this->serologiemycoplasma;
    }

    /**
     * Set serologiemethodemycoplasma
     *
     * @param string $serologiemethodemycoplasma
     *
     * @return Serologie
     */
    public function setSerologiemethodemycoplasma($serologiemethodemycoplasma)
    {
        $this->serologiemethodemycoplasma = $serologiemethodemycoplasma;

        return $this;
    }

    /**
     * Get serologiemethodemycoplasma
     *
     * @return string
     */
    public function getSerologiemethodemycoplasma()
    {
        return $this->serologiemethodemycoplasma;
    }

    /**
     * Set serologieidentificationmycoplasma
     *
     * @param string $serologieidentificationmycoplasma
     *
     * @return Serologie
     */
    public function setSerologieidentificationmycoplasma($serologieidentificationmycoplasma)
    {
        $this->serologieidentificationmycoplasma = $serologieidentificationmycoplasma;

        return $this;
    }

    /**
     * Get serologieidentificationmycoplasma
     *
     * @return string
     */
    public function getSerologieidentificationmycoplasma()
    {
        return $this->serologieidentificationmycoplasma;
    }

    /**
     * Set serologieresultatquantitatifmycoplasma
     *
     * @param string $serologieresultatquantitatifmycoplasma
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifmycoplasma($serologieresultatquantitatifmycoplasma)
    {
        $this->serologieresultatquantitatifmycoplasma = $serologieresultatquantitatifmycoplasma;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifmycoplasma
     *
     * @return string
     */
    public function getSerologieresultatquantitatifmycoplasma()
    {
        return $this->serologieresultatquantitatifmycoplasma;
    }

    /**
     * Set serologieneospora
     *
     * @param string $serologieneospora
     *
     * @return Serologie
     */
    public function setSerologieneospora($serologieneospora)
    {
        $this->serologieneospora = $serologieneospora;

        return $this;
    }

    /**
     * Get serologieneospora
     *
     * @return string
     */
    public function getSerologieneospora()
    {
        return $this->serologieneospora;
    }

    /**
     * Set serologiemethodeneospora
     *
     * @param string $serologiemethodeneospora
     *
     * @return Serologie
     */
    public function setSerologiemethodeneospora($serologiemethodeneospora)
    {
        $this->serologiemethodeneospora = $serologiemethodeneospora;

        return $this;
    }

    /**
     * Get serologiemethodeneospora
     *
     * @return string
     */
    public function getSerologiemethodeneospora()
    {
        return $this->serologiemethodeneospora;
    }

    /**
     * Set serologieresultatquantitatifneospora
     *
     * @param string $serologieresultatquantitatifneospora
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifneospora($serologieresultatquantitatifneospora)
    {
        $this->serologieresultatquantitatifneospora = $serologieresultatquantitatifneospora;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifneospora
     *
     * @return string
     */
    public function getSerologieresultatquantitatifneospora()
    {
        return $this->serologieresultatquantitatifneospora;
    }

    /**
     * Set serologieparainfluenzapi3
     *
     * @param string $serologieparainfluenzapi3
     *
     * @return Serologie
     */
    public function setSerologieparainfluenzapi3($serologieparainfluenzapi3)
    {
        $this->serologieparainfluenzapi3 = $serologieparainfluenzapi3;

        return $this;
    }

    /**
     * Get serologieparainfluenzapi3
     *
     * @return string
     */
    public function getSerologieparainfluenzapi3()
    {
        return $this->serologieparainfluenzapi3;
    }

    /**
     * Set serologiemethodeparainfluenzapi3
     *
     * @param string $serologiemethodeparainfluenzapi3
     *
     * @return Serologie
     */
    public function setSerologiemethodeparainfluenzapi3($serologiemethodeparainfluenzapi3)
    {
        $this->serologiemethodeparainfluenzapi3 = $serologiemethodeparainfluenzapi3;

        return $this;
    }

    /**
     * Get serologiemethodeparainfluenzapi3
     *
     * @return string
     */
    public function getSerologiemethodeparainfluenzapi3()
    {
        return $this->serologiemethodeparainfluenzapi3;
    }

    /**
     * Set serologieresultatquantitatifparainfluenzapi3
     *
     * @param string $serologieresultatquantitatifparainfluenzapi3
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifparainfluenzapi3($serologieresultatquantitatifparainfluenzapi3)
    {
        $this->serologieresultatquantitatifparainfluenzapi3 = $serologieresultatquantitatifparainfluenzapi3;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifparainfluenzapi3
     *
     * @return string
     */
    public function getSerologieresultatquantitatifparainfluenzapi3()
    {
        return $this->serologieresultatquantitatifparainfluenzapi3;
    }

    /**
     * Set serologiersv
     *
     * @param string $serologiersv
     *
     * @return Serologie
     */
    public function setSerologiersv($serologiersv)
    {
        $this->serologiersv = $serologiersv;

        return $this;
    }

    /**
     * Get serologiersv
     *
     * @return string
     */
    public function getSerologiersv()
    {
        return $this->serologiersv;
    }

    /**
     * Set serologiemethodersv
     *
     * @param string $serologiemethodersv
     *
     * @return Serologie
     */
    public function setSerologiemethodersv($serologiemethodersv)
    {
        $this->serologiemethodersv = $serologiemethodersv;

        return $this;
    }

    /**
     * Get serologiemethodersv
     *
     * @return string
     */
    public function getSerologiemethodersv()
    {
        return $this->serologiemethodersv;
    }

    /**
     * Set serologieresultatquantitatifrsv
     *
     * @param string $serologieresultatquantitatifrsv
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifrsv($serologieresultatquantitatifrsv)
    {
        $this->serologieresultatquantitatifrsv = $serologieresultatquantitatifrsv;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifrsv
     *
     * @return string
     */
    public function getSerologieresultatquantitatifrsv()
    {
        return $this->serologieresultatquantitatifrsv;
    }

    /**
     * Set serologievisnamaedi
     *
     * @param string $serologievisnamaedi
     *
     * @return Serologie
     */
    public function setSerologievisnamaedi($serologievisnamaedi)
    {
        $this->serologievisnamaedi = $serologievisnamaedi;

        return $this;
    }

    /**
     * Get serologievisnamaedi
     *
     * @return string
     */
    public function getSerologievisnamaedi()
    {
        return $this->serologievisnamaedi;
    }

    /**
     * Set serologiemethodevisnamaedi
     *
     * @param string $serologiemethodevisnamaedi
     *
     * @return Serologie
     */
    public function setSerologiemethodevisnamaedi($serologiemethodevisnamaedi)
    {
        $this->serologiemethodevisnamaedi = $serologiemethodevisnamaedi;

        return $this;
    }

    /**
     * Get serologiemethodevisnamaedi
     *
     * @return string
     */
    public function getSerologiemethodevisnamaedi()
    {
        return $this->serologiemethodevisnamaedi;
    }

    /**
     * Set serologieresultatquantitatifvisnamaedi
     *
     * @param string $serologieresultatquantitatifvisnamaedi
     *
     * @return Serologie
     */
    public function setSerologieresultatquantitatifvisnamaedi($serologieresultatquantitatifvisnamaedi)
    {
        $this->serologieresultatquantitatifvisnamaedi = $serologieresultatquantitatifvisnamaedi;

        return $this;
    }

    /**
     * Get serologieresultatquantitatifvisnamaedi
     *
     * @return string
     */
    public function getSerologieresultatquantitatifvisnamaedi()
    {
        return $this->serologieresultatquantitatifvisnamaedi;
    }

    /**
     * Set serologieautrepcr
     *
     * @param string $serologieautrepcr
     *
     * @return Serologie
     */
    public function setSerologieautrepcr($serologieautrepcr)
    {
        $this->serologieautrepcr = $serologieautrepcr;

        return $this;
    }

    /**
     * Get serologieautrepcr
     *
     * @return string
     */
    public function getSerologieautrepcr()
    {
        return $this->serologieautrepcr;
    }

    /**
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return Serologie
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
