<?php
namespace EcomBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\RouterInterface;
use HolluxBundle\Entity\BoiteSmashUp;

class LoadBoiteSmashUp extends AbstractFixture implements OrderedFixtureInterface
{

	public function load(ObjectManager $manager)
	{
		$boite1 = new BoiteSmashUp();
		$boite1->setName('Boite de base');
		$boite1->setBase($this->getReference('base'));
		$manager->persist($boite1);
		$boite2 = new BoiteSmashUp();
		$boite2->setName('Meme pas mort');
		$boite2->setBase($this->getReference('base'));
		$manager->persist($boite2);
		$boite3 = new BoiteSmashUp();
		$boite3->setName('Cthulhu Fhtagn');
		$boite3->setBase($this->getReference('base'));
		$manager->persist($boite3);
		$boite4 = new BoiteSmashUp();
		$boite4->setName('Serie B');
		$boite4->setBase($this->getReference('base'));
		$manager->persist($boite4);
		$boite5 = new BoiteSmashUp();
		$boite5->setName('Monstres sacres');
		$boite5->setBase($this->getReference('base'));
		$manager->persist($boite5);
		$boite6 = new BoiteSmashUp();
		$boite6->setName('GBpGeek');
		$boite6->setBase($this->getReference('base'));
		$manager->persist($boite6);
		$boite7 = new BoiteSmashUp();
		$boite7->setName('Trop Minions');
		$boite7->setBase($this->getReference('base'));
		$manager->persist($boite7);
		$boite8 = new BoiteSmashUp();
		$boite8->setName('Munchkin');
		$boite8->setBase($this->getReference('base'));
		$manager->persist($boite8);
		$boite9 = new BoiteSmashUp();
		$boite9->setName("It's your fault");
		$boite9->setBase($this->getReference('base'));
		$manager->persist($boite9);
		$boite10 = new BoiteSmashUp();
		$boite10->setName("Cease and desist");
		$boite10->setBase($this->getReference('base'));
		$manager->persist($boite10);
		$this->addReference('boite1', $boite1);
		$this->addReference('boite2', $boite2);
		$this->addReference('boite3', $boite3);
		$this->addReference('boite4', $boite4);
		$this->addReference('boite5', $boite5);
		$this->addReference('boite6', $boite6);
		$this->addReference('boite7', $boite7);
		$this->addReference('boite8', $boite8);
		$this->addReference('boite9', $boite9);
		$this->addReference('boite10', $boite10);
		$manager->flush();
	}

    public function getOrder()
    {
        return 2;
    }
}