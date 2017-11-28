<?php
namespace HolluxBundle\Repository;

/**
 * ResponseRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ResponseRepository extends \Doctrine\ORM\EntityRepository
{
	public function findOneByTokenJeuxAndQuestion($tokenJeux/*, $author*/)
	{
		$qb = $this->createQuerybuilder('r')->select('r')->where('r.tokenJeux = :tokenJeuxId')
			->andWhere('r.question = :question')/*		        ->andWhere('r.user = :user')*/
		->setMaxResults(1)->setParameters(['tokenJeuxId' => $tokenJeux->getId(),
		                                   'question'    => $tokenJeux->getNbrQuestion()/*,
		        					  'user'=>$author*/]);

		return $qb->getQuery()->getOneOrNullResult();
	}
}