<?php

namespace ListBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListType
 *
 * @ORM\Table(name="listbuilder_listtype")
 * @ORM\Entity(repositoryClass="ListBuilderBundle\Repository\ListTypeRepository")
 */
class ListType
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
    * @ORM\OneToMany(targetEntity="Liste", mappedBy="type")
    */
    private $lists;


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
     * @return ListType
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
     * Constructor
     */
    public function __construct()
    {
        $this->lists = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add list
     *
     * @param \ListBuilderBundle\Entity\Liste $list
     *
     * @return ListType
     */
    public function addList(\ListBuilderBundle\Entity\Liste $list)
    {
        $this->lists[] = $list;

        return $this;
    }

    /**
     * Remove list
     *
     * @param \ListBuilderBundle\Entity\Liste $list
     */
    public function removeList(\ListBuilderBundle\Entity\Liste $list)
    {
        $this->lists->removeElement($list);
    }

    /**
     * Get lists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLists()
    {
        return $this->lists;
    }
}
