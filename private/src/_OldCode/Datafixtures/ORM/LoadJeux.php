<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\RouterInterface;
use HolluxBundle\Entity\Jeux;

class LoadJeux extends AbstractFixture implements FixtureInterface
{

	public function load(ObjectManager $manager)
	{
		$arrayJeux = ['jeux', 'miniJeux'];
		$i         = 1;
		foreach($arrayJeux as $jeuxX) {
			$jeux = new Jeux();
			$jeux->setName($jeuxX);
			$manager->persist($jeux);
			$this->addReference('jeux'.$i, $jeux);
			$i++;
		}
		//var_dump($this->getReference('jeux2'));exit;
		$manager->flush();
		//boucle de boucle
		/*foreach ($arrayJeux as $name => $jeuxX) {
			foreach ($jeuxX as $jeuxXX) { 
				$jeux = new Jeux();
				$jeux->setName($name);
				$jeux->setQuestion($i);
				$jeux->setResponse($jeuxXX);
				$manager->persist($jeux);
				$this->addReference('jeux'.$i, $jeux);
				$i++;
			}
			$i = 1;
		}*/
	}
}