<?php
namespace AppBundle\Repository;

/**
 * ForumRepository
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ForumRepository extends \Doctrine\ORM\EntityRepository
{
	public function getForumPosts($id)
	{
		if($id == "") {
			$forumPosts = $this->findByDepth(0);
		}
		else {
			$forumPosts = $this->findById($id);
		}

		return $forumPosts;
	}
}
