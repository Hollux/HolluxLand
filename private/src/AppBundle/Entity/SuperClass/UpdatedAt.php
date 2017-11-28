<?php
namespace AppBundle\Entity\SuperClass;

use Doctrine\ORM\Mapping as ORM;

/*
 * @ORM\MappedSuperclass
 */
trait UpdatedAt
{
    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updatedAt", type="datetime", nullable=true)
     */
    private $updatedAt;

}