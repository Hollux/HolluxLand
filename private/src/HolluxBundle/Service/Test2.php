<?php
namespace HolluxBundle\Service;


use Doctrine\ORM\EntityManagerInterface;
use HolluxBundle\Entity\Magasin;

class Test2
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getVal(){

        $data = $this->em->getRepository('HolluxBundle:Magasin')->findAll();

        return $data;
    }

    public function addval($val = 'toto'){

        $mag = new Magasin();
        $mag->setName($val);
        $this->em->persist($mag);
        $this->em->flush();

        return $val;
    }


}