<?php

namespace ListBuilderBundle\Repository;

use ListBuilderBundle\Entity\Figurine;

class FigurineRepository extends \Doctrine\ORM\EntityRepository
{
    public function findOptionsByTypeByFig(Figurine $figurine, $stringType)
    {
        $qb = $this->createQuerybuilder('u')
            ->where(':figurine MEMBER OF u.figurines ')
            ->join('u.optiontype', 't', 'WITH', 't.type like :type' )
            ->orderBy('u.name', 'ASC')
            ->setParameter('type', $stringType)
            ->setParameter('figurine', $figurine)
        ;

        return $qb->getQuery()->getResult();
    }
}
