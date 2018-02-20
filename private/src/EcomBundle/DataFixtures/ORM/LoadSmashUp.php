<?php
namespace EcomBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\RouterInterface;
use HolluxBundle\Entity\SmashUp;

class LoadSmashUp extends AbstractFixture implements OrderedFixtureInterface
{

	public function load(ObjectManager $manager)
	{
		$base = new SmashUp();
		$base->setId(3);
		$manager->persist($base);
		$this->addReference('base', $base);
		$manager->flush();
	}

    public function getOrder()
    {
        return 1;
    }
}