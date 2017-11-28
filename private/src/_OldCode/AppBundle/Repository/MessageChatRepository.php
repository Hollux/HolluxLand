<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class MessageChatRepository extends EntityRepository
{
	public function findLast($number)
	{
		$qb = $this->createQuerybuilder('m')->addOrderBy('m.id', "DESC")->setMaxResults($number);

		return $qb->getQuery()->getResult();
	}


	/*$qb = $this->createQuerybuilder('c')
			->join('c.catalogue', 'ca', 'WITH', 'ca.id = :idCatalogue')
			->leftJoin('c.parents', 'parents')
			->addSelect('parents')
			->orderBy('c.ordre','ASC')
			->setParameters(array('idCatalogue'  => $idCatalogue))
			;*/
}