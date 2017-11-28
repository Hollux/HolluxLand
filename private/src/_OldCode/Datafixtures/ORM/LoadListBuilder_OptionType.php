<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ListBuilderBundle\Entity\Figurine;
use ListBuilderBundle\Entity\OptionType;


class LoadListBuilder_OptionType extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $arrayType = [
            ['arme'],
            ['armure'],
            ['bouclier'],
            ['lambda'],
            ['niveau de magie'],
            ['don'],
            ['marque'],
            ['monture'],
            ['nombre de figurine'],
            ['objets magiques'],
            ['disciplines des anciens']

        ];

        foreach ($arrayType as $type) {
            $typeObj = new OptionType();
            $typeObj->setType($type[0]);
            $manager->persist($typeObj);
            $this->addReference($type[0], $typeObj);
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