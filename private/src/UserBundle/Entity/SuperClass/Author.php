<?php
namespace UserBundle\Entity\SuperClass;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** @ORM\MappedSuperclass */
trait Author
{
	/**
     * @ORM\Column(name="author", type="string", length=255)
     */
	private $author;

	public function getAuthor()
    {
        return $this->author;
    }

	public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }


}