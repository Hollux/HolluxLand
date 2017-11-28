<?php

namespace Admin\PortfolioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\SuperClass\Author;

/**
 * TypePortfolio
 *
 * @ORM\Table(name="type_portfolio")
 * @ORM\Entity(repositoryClass="Admin\PortfolioBundle\Repository\TypePortfolioRepository")
 */
class TypePortfolio
{
    use Author;
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="Portfolio", mappedBy="type")
     */
    private $portfolio;

    /**
     * @var string
     *
     * @ORM\Column(name="shorttypecontent", type="string", length=255, nullable=true)
     */
    private $shorttypecontent;


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
     * Set type
     *
     * @param string $type
     *
     * @return TypePortfolio
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
     * Set shorttypecontent
     *
     * @param string $shorttypecontent
     *
     * @return TypePortfolio
     */
    public function setShorttypecontent($shorttypecontent)
    {
        $this->shorttypecontent = $shorttypecontent;

        return $this;
    }

    /**
     * Get shorttypecontent
     *
     * @return string
     */
    public function getShorttypecontent()
    {
        return $this->shorttypecontent;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->portfolio = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add portfolio
     *
     * @param \PortfolioBundle\Entity\Portfolio $portfolio
     *
     * @return TypePortfolio
     */
    public function addPortfolio(\PortfolioBundle\Entity\Portfolio $portfolio)
    {
        $this->portfolio[] = $portfolio;

        return $this;
    }

    /**
     * Remove portfolio
     *
     * @param \PortfolioBundle\Entity\Portfolio $portfolio
     */
    public function removePortfolio(\PortfolioBundle\Entity\Portfolio $portfolio)
    {
        $this->portfolio->removeElement($portfolio);
    }

    /**
     * Get portfolio
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPortfolio()
    {
        return $this->portfolio;
    }
}
