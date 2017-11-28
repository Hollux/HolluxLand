<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ListBuilderBundle\Entity\Faction;

class LoadListBuilder_Faction extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $arrayfaction = [
            'HL' => ['Hommes-Lezards', 'HL'],
            'OG' => ['Orcs & Gobs', 'OG'],
            'CV' => ['Comtes Vampires', 'CV']
        ];

        foreach ($arrayfaction as $faction)
        {
            $factionObj = new Faction();
            $factionObj->setName($faction[0]);
            $manager->persist($factionObj);
            $this->addReference($faction[1], $factionObj);
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