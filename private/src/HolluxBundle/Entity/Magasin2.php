<?php

namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Magasin2
 *
 * @ORM\Table(name="magasin2")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\Magasin2Repository")
 */
class Magasin2
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * One magasin has Many produit2.
     * @ORM\ManyToMany(targetEntity="Produit3", mappedBy="magasins")
     */
    private $produits;


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
     * @return Magasin
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

    public function __toString()
    {

        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \AppBundle\Entity\Produit3 $produit
     *
     * @return Magasin2
     */
    public function addProduit(\AppBundle\Entity\Produit3 $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \AppBundle\Entity\Produit3 $produit
     */
    public function removeProduit(\AppBundle\Entity\Produit3 $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
