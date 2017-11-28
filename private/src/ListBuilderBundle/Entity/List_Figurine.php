<?php
namespace ListBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * List_Figurine
 *
 * @ORM\Table(name="listbuilder_list_figurine")
 * @ORM\Entity(repositoryClass="ListBuilderBundle\Repository\List_FigurineRepository")
 */
class List_Figurine
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
     * @ORM\ManyToOne(targetEntity="Liste", inversedBy="figurines", cascade={"persist"})
     * @ORM\JoinColumn(name="list_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $list;

    /**
     * @ORM\ManyToOne(targetEntity="Figurine", inversedBy="list_figurines", cascade={"persist"})
     * @ORM\JoinColumn(name="figurine_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $figurine;

    /**
     * @ORM\ManyToMany(targetEntity="Option", mappedBy="list_figurines")
     */
    private $options;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->options = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set id
     *
     * @return integer
     */
    public function SetId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set list
     *
     * @param \ListBuilderBundle\Entity\Liste $list
     *
     * @return List_Figurine
     */
    public function setList(\ListBuilderBundle\Entity\Liste $list = null)
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Get list
     *
     * @return \ListBuilderBundle\Entity\Liste
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Set figurine
     *
     * @param \ListBuilderBundle\Entity\Figurine $figurine
     *
     * @return List_Figurine
     */
    public function setFigurine(\ListBuilderBundle\Entity\Figurine $figurine = null)
    {
        $this->figurine = $figurine;

        return $this;
    }

    /**
     * Get figurine
     *
     * @return \ListBuilderBundle\Entity\Figurine
     */
    public function getFigurine()
    {
        return $this->figurine;
    }

    /**
     * Add option
     *
     * @param \ListBuilderBundle\Entity\Option $option
     *
     * @return List_Figurine
     */
    public function addOption(\ListBuilderBundle\Entity\Option $option)
    {
        if(!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->addListFigurine($this);
        }

        return $this;
    }

    /**
     * Remove option
     *
     * @param \ListBuilderBundle\Entity\Option $option
     */
    public function removeOption(\ListBuilderBundle\Entity\Option $option)
    {
        $this->options->removeElement($option);
        $option->removeListFigurine($this);
    }

    /**
     * Get options
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }



}
