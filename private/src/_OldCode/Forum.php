<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use HolluxBundle\Entity\User;

/**
 * Forum
 * @ORM\Table(name="forum")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ForumRepository")
 */
class Forum
{
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(name="title", type="string", length=255)
	 */
	private $title;

	/**
	 * @var string
	 * @ORM\Column(name="content", type="text")
	 */
	private $content;

	/**
	 * @var \DateTime
	 * @ORM\Column(name="date", type="date")
	 */
	private $date;

	/**
	 * @var int
	 * @ORM\Column(name="depth", type="integer", length=8)
	 */
	private $depth;

	/**
	 * @ORM\ManyToOne(targetEntity="HolluxBundle\Entity\User", inversedBy="forum", cascade={"persist","remove"})
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $author;

	/**
	 * @ORM\ManyToMany(targetEntity="Forum", mappedBy="parents")
	 */
	private $childs;

	/**
	 * @ORM\ManyToMany(targetEntity="Forum", inversedBy="childs", cascade={"persist","remove"})
	 * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $parents;


	/**
	 * Get id
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set title
	 * @param string $title
	 * @return Forum
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get title
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set content
	 * @param string $content
	 * @return Forum
	 */
	public function setContent($content)
	{
		$this->content = $content;

		return $this;
	}

	/**
	 * Get content
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Set date
	 * @param \DateTime $date
	 * @return Forum
	 */
	public function setDate($date)
	{
		$this->date = $date;

		return $this;
	}

	/**
	 * Get date
	 * @return \DateTime
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->childs  = new \Doctrine\Common\Collections\ArrayCollection();
		$this->parents = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Set author
	 * @param \HolluxBundle\Entity\User $author
	 * @return Forum
	 */
	public function setAuthor(\HolluxBundle\Entity\User $author = null)
	{
		$this->author = $author;

		return $this;
	}

	/**
	 * Get author
	 * @return \HolluxBundle\Entity\User
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * Add child
	 * @param \AppBundle\Entity\Forum $child
	 * @return Forum
	 */
	public function addChild(\AppBundle\Entity\Forum $child)
	{
		$this->childs[] = $child;

		return $this;
	}

	/**
	 * Remove child
	 * @param \AppBundle\Entity\Forum $child
	 */
	public function removeChild(\AppBundle\Entity\Forum $child)
	{
		$this->childs->removeElement($child);
	}

	/**
	 * Get childs
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getChilds()
	{
		return $this->childs;
	}

	/**
	 * Add parent
	 * @param \AppBundle\Entity\Forum $parent
	 * @return Forum
	 */
	public function addParent(\AppBundle\Entity\Forum $parent)
	{
		$this->parents[] = $parent;

		return $this;
	}

	/**
	 * Remove parent
	 * @param \AppBundle\Entity\Forum $parent
	 */
	public function removeParent(\AppBundle\Entity\Forum $parent)
	{
		$this->parents->removeElement($parent);
	}

	/**
	 * Get parents
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getParents()
	{
		return $this->parents;
	}

	/**
	 * Set depth
	 * @param integer $depth
	 * @return Forum
	 */
	public function setDepth($depth)
	{
		$this->depth = $depth;

		return $this;
	}

	/**
	 * Get depth
	 * @return integerHolluxBundle
	 */
	public function getDepth()
	{
		return $this->depth;
	}
}
