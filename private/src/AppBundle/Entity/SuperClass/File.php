<?php
namespace AppBundle\Entity\SuperClass;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** @ORM\MappedSuperclass */
trait File
{
	/**
	 * @ORM\Column(type="string", nullable=true)
	 * @Assert\File(mimeTypes={"image/jpeg", "image/png"})
	 */
	private $file;

	public function getFile()
	{
		return $this->file;
	}

	public function setFile($file)
	{
		$this->file = $file;

		return $this;
	}

}
