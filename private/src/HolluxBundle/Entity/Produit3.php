<?php

namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit3")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\Produit3Repository")
 */
class Produit3
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
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * Many produit have One magasin.
     * @ORM\ManyToMany(targetEntity="Magasin2", inversedBy="produits")
     * @ORM\JoinTable(name="produit3_magasin2")
     */
    private $magasins;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


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
     * @return Produit
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
     * Set price
     *
     * @param integer $price
     *
     * @return Produit
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Produit
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->magasins = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add magasin
     *
     * @param \AppBundle\Entity\Magasin2 $magasin
     *
     * @return Produit3
     */
    public function addMagasin(\AppBundle\Entity\Magasin2 $magasin)
    {
        $this->magasins[] = $magasin;

        return $this;
    }

    /**
     * Remove magasin
     *
     * @param \AppBundle\Entity\Magasin2 $magasin
     */
    public function removeMagasin(\AppBundle\Entity\Magasin2 $magasin)
    {
        $this->magasins->removeElement($magasin);
    }

    /**
     * Get magasins
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMagasins()
    {
        return $this->magasins;
    }
}
