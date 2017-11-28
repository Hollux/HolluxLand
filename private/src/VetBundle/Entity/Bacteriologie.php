<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bacteriologie
 * @ORM\Table(name="vet_anabel_bacteriologie")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\BacteriologieRepository")
 */
class Bacteriologie
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
     * @ORM\OneToOne(targetEntity="Avortement", mappedBy="bacteriologie", cascade={"persist", "remove"})
     */
    private $avortement;

    /**
     * @var string
     *
     * @ORM\Column(name="bacteriologiebrucella", type="string", length=255, nullable=true)
     */
    private $bacteriologiebrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="bacteriologieidentificationbrucella", type="string", length=255, nullable=true)
     */
    private $bacteriologieidentificationbrucella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="bacteriologielisteria", type="string", length=255, nullable=true)
     */
    private $bacteriologielisteria;
    

    /**
     * @var string
     *
     * @ORM\Column(name="bacteriologieidentificationlisteria", type="string", length=255, nullable=true)
     */
    private $bacteriologieidentificationlisteria;
    

    /**
     * @var string
     *
     * @ORM\Column(name="bacteriologiesalmonella", type="string", length=255, nullable=true)
     */
    private $bacteriologiesalmonella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="bacteriologieidentificationsalmonella", type="string", length=255, nullable=true)
     */
    private $bacteriologieidentificationsalmonella;
    

    /**
     * @var string
     *
     * @ORM\Column(name="bacteriologieautrebacteriologie", type="string", length=255, nullable=true)
     */
    private $bacteriologieautrebacteriologie;
    

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
     * Set bacteriologiebrucella
     *
     * @param string $bacteriologiebrucella
     *
     * @return Bacteriologie
     */
    public function setBacteriologiebrucella($bacteriologiebrucella)
    {
        $this->bacteriologiebrucella = $bacteriologiebrucella;

        return $this;
    }

    /**
     * Get bacteriologiebrucella
     *
     * @return string
     */
    public function getBacteriologiebrucella()
    {
        return $this->bacteriologiebrucella;
    }

    /**
     * Set bacteriologieidentificationbrucella
     *
     * @param string $bacteriologieidentificationbrucella
     *
     * @return Bacteriologie
     */
    public function setBacteriologieidentificationbrucella($bacteriologieidentificationbrucella)
    {
        $this->bacteriologieidentificationbrucella = $bacteriologieidentificationbrucella;

        return $this;
    }

    /**
     * Get bacteriologieidentificationbrucella
     *
     * @return string
     */
    public function getBacteriologieidentificationbrucella()
    {
        return $this->bacteriologieidentificationbrucella;
    }

    /**
     * Set bacteriologielisteria
     *
     * @param string $bacteriologielisteria
     *
     * @return Bacteriologie
     */
    public function setBacteriologielisteria($bacteriologielisteria)
    {
        $this->bacteriologielisteria = $bacteriologielisteria;

        return $this;
    }

    /**
     * Get bacteriologielisteria
     *
     * @return string
     */
    public function getBacteriologielisteria()
    {
        return $this->bacteriologielisteria;
    }

    /**
     * Set bacteriologieidentificationlisteria
     *
     * @param string $bacteriologieidentificationlisteria
     *
     * @return Bacteriologie
     */
    public function setBacteriologieidentificationlisteria($bacteriologieidentificationlisteria)
    {
        $this->bacteriologieidentificationlisteria = $bacteriologieidentificationlisteria;

        return $this;
    }

    /**
     * Get bacteriologieidentificationlisteria
     *
     * @return string
     */
    public function getBacteriologieidentificationlisteria()
    {
        return $this->bacteriologieidentificationlisteria;
    }

    /**
     * Set bacteriologiesalmonella
     *
     * @param string $bacteriologiesalmonella
     *
     * @return Bacteriologie
     */
    public function setBacteriologiesalmonella($bacteriologiesalmonella)
    {
        $this->bacteriologiesalmonella = $bacteriologiesalmonella;

        return $this;
    }

    /**
     * Get bacteriologiesalmonella
     *
     * @return string
     */
    public function getBacteriologiesalmonella()
    {
        return $this->bacteriologiesalmonella;
    }

    /**
     * Set bacteriologieidentificationsalmonella
     *
     * @param string $bacteriologieidentificationsalmonella
     *
     * @return Bacteriologie
     */
    public function setBacteriologieidentificationsalmonella($bacteriologieidentificationsalmonella)
    {
        $this->bacteriologieidentificationsalmonella = $bacteriologieidentificationsalmonella;

        return $this;
    }

    /**
     * Get bacteriologieidentificationsalmonella
     *
     * @return string
     */
    public function getBacteriologieidentificationsalmonella()
    {
        return $this->bacteriologieidentificationsalmonella;
    }

    /**
     * Set bacteriologieautrebacteriologie
     *
     * @param string $bacteriologieautrebacteriologie
     *
     * @return Bacteriologie
     */
    public function setBacteriologieautrebacteriologie($bacteriologieautrebacteriologie)
    {
        $this->bacteriologieautrebacteriologie = $bacteriologieautrebacteriologie;

        return $this;
    }

    /**
     * Get bacteriologieautrebacteriologie
     *
     * @return string
     */
    public function getBacteriologieautrebacteriologie()
    {
        return $this->bacteriologieautrebacteriologie;
    }

    /**
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return Bacteriologie
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
