<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class CategorieRepository extends EntityRepository
{
	public function search($data, $start = 0, $lenght = null)
	{
		$qb    = $this->_em->createQueryBuilder();
		$query = isset($data['query']) && $data['query'] ? $data['query'] : null;
		$qb->select('c')->from('AppBundle:Categorie', 'c');
		if($query) {
			$qb->andWhere('c.name like :query')->setParameter('query', "%".$query."%");
		}
		$qb->setFirstResult($start * $lenght)->setMaxResults($lenght);
		$list = new Paginator($qb);

		return $list;
	}

    public function test($data, $start = 0, $lenght = null)
    {
        $qb    = $this->_em->createQueryBuilder();
        $qb->select('cm')->from('AppBundle:Categorie', 'cm');
        $qb->andWhere('cm.nompersonne like :value')->setParameter('value', "%".$value."%");
        $qb->setFirstResult($start * $lenght)->setMaxResults($lenght);
        $list = new Paginator($qb);

        return $list;
    }
}