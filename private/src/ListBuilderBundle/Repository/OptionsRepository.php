<?php

namespace ListBuilderBundle\Repository;

/**
 * OptionsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OptionsRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByType($idfigurine, $stirngType)
    {
        $qb = $this->createQueryBuilder('u')
            ->where(':figurine MEMBER OF u.figurines ')
            ->join('u.optiontype', 't', 'WITH', 't.type like :type' )
            ->orderBy('u.name', 'ASC')

            ->setParameter('type', $stirngType)
            ->setParameter('figurine', $idfigurine)
        ;

        return $qb->getQuery()->getResult();
    }
}
