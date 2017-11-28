<?php

namespace ListBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OptionType
 *
 * @ORM\Table(name="listbuilder_optiontype")
 * @ORM\Entity(repositoryClass="ListBuilderBundle\Repository\OptionTypeRepository")
 */
class OptionType
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="Option", mappedBy="optiontype")
     */
    private $figoptions;


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
     * @return OptionType
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
        $this->figoptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add figoption
     *
     * @param \ListBuilderBundle\Entity\Option $figoption
     *
     * @return OptionType
     */
    public function addFigoption(\ListBuilderBundle\Entity\Option $figoption)
    {
        $this->figoptions[] = $figoption;

        return $this;
    }

    /**
     * Remove figoption
     *
     * @param \ListBuilderBundle\Entity\Option $figoption
     */
    public function removeFigoption(\ListBuilderBundle\Entity\Option $figoption)
    {
        $this->figoptions->removeElement($figoption);
    }

    /**
     * Get figoptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFigoptions()
    {
        return $this->figoptions;
    }
}
