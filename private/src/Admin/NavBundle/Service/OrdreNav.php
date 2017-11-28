<?php
namespace Admin\NavBundle\Service;

use Doctrine\ORM\EntityManager;

class OrdreNav
{
    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function OrdrePlus($navs, $number)
    {
        foreach($navs as $nav)
        {
            if($nav->getOrdre() == $number)
            {
                $this->OrdrePlus($navs, $number+1);
                $nav->setOrdre($number+1);
                $this->em->persist($nav);
                $this->em->flush();
            }
        }
    }

    public function OrdreMoins($navs, $number)
    {
        foreach($navs as $nav)
        {
            if($nav->getOrdre() == $number)
            {
                $this->OrdreMoins($navs, $number-1);
                $nav->setOrdre($number-1);
                $this->em->persist($nav);
                $this->em->flush();
            }
        }

    }

}