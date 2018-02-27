<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ListBuilderBundle\Entity\ListType;

class LoadListBuilder_ListType extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $arrayType = [
            'Tournois',
            'Normal',
            'Fun',
            'Test',
        ];

        foreach ($arrayType as $typec)
        {
            $type = new ListType();
            $type->setName($typec);
            $this->addReference($typec, $type);
            $manager->persist($type);
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