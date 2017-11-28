<?php
namespace Admin\PortfolioBundle\Entity;

use AppBundle\Entity\SuperClass\MediaTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table(name="portfolio")
 * @ORM\Entity(repositoryClass="Admin\PortfolioBundle\Repository\PortfolioRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Portfolio
{
    use MediaTrait;

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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="TypePortfolio", inversedBy="portfolio", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="shortcontent", type="string", length=255)
     */
    private $shortcontent;

    /**
     * @var text
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set title
     *
     * @param string $title
     *
     * @return Portfolio
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
     * Set shortcontent
     *
     * @param string $shortcontent
     *
     * @return Portfolio
     */
    public function setShortcontent($shortcontent)
    {
        $this->shortcontent = $shortcontent;

        return $this;
    }

    /**
     * Get shortcontent
     *
     * @return string
     */
    public function getShortcontent()
    {
        return $this->shortcontent;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Portfolio
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Portfolio
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

	/**
	 * @ORM\PrePersist()
     * @ORM\PreUpdate()
	 */
	public function datePrePersist()
	{
		$this->setDate(new \DateTime("now"));
	}

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Portfolio
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
     * Set typee
     *
     * @param \Admin\PortfolioBundle\Entity\TypePortfolio $typee
     *
     * @return Portfolio
     */
    public function setTypee(\Admin\PortfolioBundle\Entity\TypePortfolio $typee = null)
    {
        $this->typee = $typee;

        return $this;
    }

    /**
     * Get typee
     *
     * @return \Admin\PortfolioBundle\Entity\TypePortfolio
     */
    public function getTypee()
    {
        return $this->typee;
    }
}
