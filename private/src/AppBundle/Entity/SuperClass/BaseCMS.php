<?php
namespace AppBundle\Entity\Superclass;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\MappedSuperclass */
trait BaseCMS
{

	/**
	 * @var string
	 * @ORM\Column(name="title", type="string", length=50)
	 */
	private $title;

	/**
	 * @var string
	 * @ORM\Column(name="url", type="string", length=50, nullable=true)
	 */
	private $url;

	/**
	 * @var string
	 * @ORM\Column(name="content", type="string", length=2054, nullable=true)
	 */
	private $content;

	/**
	 * @var string
	 * @ORM\Column(name="shortContent", type="string", length=255, nullable=true)
	 */
	private $shortContent;

	/**
	 * @var string
	 * @ORM\Column(name="ordre", type="integer")
	 */
	private $ordre = 0;

	/**
	 * @ORM\ManyToOne(targetEntity="Alcyon\CoreBundle\Entity\Media")
	 * @ORM\JoinColumn(name="id_defaultImage", referencedColumnName="id")
	 */
	private $defaultImage;


	/**
	 * Set url
	 * @param string $url
	 * @return BaseCMS
	 */
	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * Get url
	 * @return string
	 */
	public function getUrl()
	{
		if(null == $this->url) {
			$title = $this->getTitle();
			$title = $this->str_to_noaccent($title);
			$title = strtolower($title);
			$title = preg_replace('/[^a-z0-9-]+/', '-', $title);

			return '/categorie/'.$this->getId().'-'.$title;
		}

		return $this->url;
	}

	/**
	 * Set title
	 * @param string $title
	 * @return BaseCMS
	 */
	public function setTitle($title)
	{
		$this->title = ucfirst($title);

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
	 * @return BaseCMS
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
	 * Set shortContent
	 * @param string $shortContent
	 * @return BaseCMS
	 */
	public function setShortContent($shortContent)
	{
		$this->shortContent = $shortContent;

		return $this;
	}

	/**
	 * Get shortContent
	 * @return string
	 */
	public function getShortContent()
	{
		return $this->shortContent;
	}

	/**
	 * Set ordre
	 * @param integer $ordre
	 * @return BaseCMS
	 */
	public function setOrdre($ordre)
	{
		$this->ordre = $ordre;

		return $this;
	}

	/**
	 * Get ordre
	 * @return integer
	 */
	public function getOrdre()
	{
		return $this->ordre;
	}

	/**
	 * Set defaultImage
	 * @param \Alcyon\CoreBundle\Entity\MappedSuperclass\Media $defaultImage
	 * @return BaseCMS
	 */
	public function setDefaultImage(Media $defaultImage = null)
	{
		$this->defaultImage = $defaultImage;

		return $this;
	}

	/**
	 * Get defaultImage
	 * @return \Alcyon\CoreBundle\Entity\MappedSuperclass\Media
	 */
	public function getDefaultImage()
	{
		return $this->defaultImage;
	}

	function str_to_noaccent($str, $charset = 'utf-8')
	{
		$str = htmlentities($str, ENT_NOQUOTES, $charset);
		$str = preg_replace('#&([A-za-z])(?:acute|cedil|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
		$str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
		$str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
		return ($str);
	}
}
