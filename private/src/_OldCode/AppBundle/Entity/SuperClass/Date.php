<?php
namespace AppBundle\Entity\SuperClass;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** @ORM\MappedSuperclass */
trait Date
{
    /**
     * @ORM\Column(name="createdat", type="date")
     */
    private $createdat;

    public function getCreatedad()
    {
        return $this->createdat;
    }

    public function setCreatedad($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * @ORM\Column(name="updatedat", type="date", nullable=true)
     */
    private $updatedat;

    public function getUpdatedat()
    {
        return $this->updatedat;
    }

    public function setUpdatedat($updatedat)
    {
        $this->updatedat = $updatedat;

        return $this;
    }


}