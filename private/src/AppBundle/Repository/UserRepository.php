<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
	/*public function findById($id)
	{
		$qb = $this->createQuerybuilder('m')
				->Where('m.id = 6');

		return $qb->getQuery()->getResult();
	}*/
}
