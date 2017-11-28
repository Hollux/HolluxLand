<?php
namespace VetBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VetBundle\Entity\Nav;

class Vet_Nav extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $arraynav = [
            ''

        ];

        foreach ($arraynav as $navs)
        {
            $nav = new Nav();
            $nav->setName($navs);
            $manager->persist($nav);
            $this->addReference($navs, $nav);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

}