<?php

namespace Admin\NavBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nav
 *
 * @ORM\Table(name="nav")
 * @ORM\Entity(repositoryClass="Admin\NavBundle\Repository\NavRepository")
 */
class Nav
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
     * @ORM\Column(name="content", type="string", length=50, unique=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=30, unique=true)
     */
    private $url;

    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

    /**
     * @var int
     *
     * @ORM\Column(name="isvisible", type="boolean")
     */
    private $isvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="page", type="text")
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;


    /**
     * @ORM\OneToMany(targetEntity="Nav", mappedBy="children")
     */
    private $parent;

    /**
     * @ORM\ManyToOne(targetEntity="Nav", inversedBy="parent", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="nav_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $children;

    public function __construct() {
        $this->parent = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set content
     *
     * @param string $content
     *
     * @return Nav
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
     * Set url
     *
     * @param string $url
     *
     * @return Nav
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Nav
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return int
     */
    public function getOrdre()
    {
        return $this->ordre;
    }

    /**
     * Set isvisible
     *
     * @param integer $isvisible
     *
     * @return Nav
     */
    public function setIsvisible($isvisible)
    {
        $this->isvisible = $isvisible;

        return $this;
    }

    /**
     * Get isvisible
     *
     * @return int
     */
    public function getIsvisible()
    {
        return $this->isvisible;
    }

    /**
     * Add parent
     *
     * @param \Admin\NavBundle\Entity\Nav $parent
     *
     * @return Nav
     */
    public function addParent(\Admin\NavBundle\Entity\Nav $parent)
    {
        $this->parent[] = $parent;

        return $this;
    }

    /**
     * Remove parent
     *
     * @param \Admin\NavBundle\Entity\Nav $parent
     */
    public function removeParent(\Admin\NavBundle\Entity\Nav $parent)
    {
        $this->parent->removeElement($parent);
    }

    /**
     * Get parent
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set children
     *
     * @param \Admin\NavBundle\Entity\Nav $children
     *
     * @return Nav
     */
    public function setChildren(\Admin\NavBundle\Entity\Nav $children = null)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * Get children
     *
     * @return \Admin\NavBundle\Entity\Nav
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set page
     *
     * @param string $page
     *
     * @return Nav
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Nav
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
}
