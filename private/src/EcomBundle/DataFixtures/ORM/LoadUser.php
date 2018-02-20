<?php
namespace EcomBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use HolluxBundle\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
	private $container;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}

	public function load(ObjectManager $manager)
	{
		$user1 = new User();
		$user1->setName('Hollux');
		$user1->setPassword($this->container->get('security.encoder_factory')->getEncoder($user1)
			->encodePassword('hollux123', $user1->getSalt()));
		$user1->setLogin('hollux');
		$user1->setEmail('hollux@hotmail.fr');
		$user1->setRoles('ROLE_ADMIN');
		//     $user1->setInscriptionDate(time());
		$manager->persist($user1);
		$user2 = new User();
		$user2->setName('Albator');
		$user2->setPassword($this->container->get('security.encoder_factory')->getEncoder($user2)
			->encodePassword('albator123', $user2->getSalt()));
		$user2->setLogin('albator');
		$user2->setEmail('albator@albator.fr');
		$user2->setRoles('ROLE_USER');
		//     $user2->setInscriptionDate(time());
		$manager->persist($user2);
		$this->addReference('user1', $user1);
		$manager->flush();
	}

    public function getOrder()
    {
        return 0;
    }
}