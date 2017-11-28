<?php
namespace AppBundle\Repository;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * PartieRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartieRepository extends \Doctrine\ORM\EntityRepository
{
	public function getReponse(UserInterface $user, $jeux)
	{
		$qb = $this->createQuerybuilder('p')->select('p')->leftJoin('p.author', 'author')->addSelect('author')
			->where('p.author = :user')->andWhere('p.game = :jeux')->setParameters(['user' => $user, 'jeux' => $jeux]);

		return $qb->getQuery()->getResult();
	}
}
