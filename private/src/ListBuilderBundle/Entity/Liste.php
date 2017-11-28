<?php

namespace ListBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use UserBundle\Entity\SuperClass\Author;

/**
 * Liste
 *
 * @ORM\Table(name="listbuilder_liste")
 * @ORM\Entity(repositoryClass="ListBuilderBundle\Repository\ListeRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Liste
{
    use TimestampableEntity, Author;

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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isvisible", type="boolean", options={"default" : 0})
     */
    private $isvisible;

    /**
     * @var int
     *
     * @ORM\Column(name="quote", type="integer", nullable=true)
     */
    private $quote;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", nullable=true)
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="issubmited", type="boolean", options={"default" : 0})
     */
    private $isSubmited;


    /**
     * @ORM\OneToMany(targetEntity="List_Figurine", mappedBy="list", cascade={"persist"})
     */
    private $figurines;

    //Type de liste (fun, tournois, thème etc)
    /**
     * @ORM\ManyToOne(targetEntity="ListType", inversedBy="lists", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="listtype_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $type;

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
     * Set title
     *
     * @param string $title
     *
     * @return ListBuilderList
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set quote
     *
     * @param integer $quote
     *
     * @return ListBuilderList
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * Get quote
     *
     * @return integer
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return ListBuilderList
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @ORM\PrePersist()
     */
    public function isVisibleIsSubmitedPrePersist()
    {
        $this->setIsSubmited(0);
        $this->setIsvisible(0);
    }

    /**
     * Set isvisible
     *
     * @param boolean $isvisible
     *
     * @return ListBuilderList
     */
    public function setIsvisible($isvisible)
    {
        $this->isvisible = $isvisible;

        return $this;
    }

    /**
     * Get isvisible
     *
     * @return boolean
     */
    public function getIsvisible()
    {
        return $this->isvisible;
    }

    /**
     * Set isSubmited
     *
     * @param boolean $isSubmited
     *
     * @return ListBuilderList
     */
    public function setIsSubmited($isSubmited)
    {
        $this->isSubmited = $isSubmited;

        return $this;
    }

    /**
     * Get isSubmited
     *
     * @return boolean
     */
    public function getIsSubmited()
    {
        return $this->isSubmited;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->figurines = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Remove figurine
     *
     * @param \ListBuilderBundle\Entity\List_Figurine $figurine
     */
    public function removeFigurine(\ListBuilderBundle\Entity\List_Figurine $figurine)
    {
        $this->figurines->removeElement($figurine);
        $figurine->setFigurine(null);
    }

    /**
     * Add figurine
     *
     * @param \ListBuilderBundle\Entity\List_Figurine $figurine
     *
     * @return ListBuilderList
     */
    public function addFigurine(\ListBuilderBundle\Entity\List_Figurine $figurine)
    {
        if (!$this->figurines->contains($figurine)) {
            $this->figurines[] = $figurine;
            $figurine->setList($this);
        }

        return $this;
    }

    /**
     * Get figurines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFigurines()
    {
        return $this->figurines;
    }

    /**
     * Set type
     *
     * @param \ListBuilderBundle\Entity\ListType $type
     *
     * @return ListBuilderList
     */
    public function setType(\ListBuilderBundle\Entity\ListType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \ListBuilderBundle\Entity\ListType
     */
    public function getType()
    {
        return $this->type;
    }
}
