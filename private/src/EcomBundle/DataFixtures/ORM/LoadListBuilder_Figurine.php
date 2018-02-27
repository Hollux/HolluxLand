<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ListBuilderBundle\Entity\Figurine;

class LoadListBuilder_Figurine extends AbstractFixture implements OrderedFixtureInterface
{
//['nom', '1', '1', 'm', 'c', 't', 'f', 'e', 'v', 'i', 'a', 'c', 'content', '', 'HL'],
    public function load(ObjectManager $manager)
    {
        $arrayfigurine = [
            ['pretre-mage slann', '1', '1', '4', '2', '3', '3', '4', '5', '2', '1', '9', 'content', '300', 'HL'],
            ['sang ancien saurus', '1', '1', '4', '6', '0', '5', '5', '3', '3', '5', '8', 'content', '140', 'HL'],
            ['pretre skink', '1', '1', '6', '2', '3', '3', '2', '2', '4', '1', '6', 'content', '65', 'HL'],
            ['veteran scarifie saurus', '1', '1', '4', '5', '0', '5', '5', '2', '3', '4', '8', 'content', '80', 'HL'],
            ['chef skink', '1', '1', '6', '4', '5', '4', '3', '2', '6', '3', '6', 'content', '40', 'HL'],
            ['guerriers saurus', '10', '30', '4', '3', '0', '4', '4', '1', '1', '2', '8', 'content', '11', 'HL'],
            ['cohorte de skinks', '10', '30', '6', '2', '3', '3', '2', '1', '4', '1', '5', 'content', '5', 'HL'],
            ['tirailleurs skinks', '10', '30', '6', '2', '3', '3', '2', '1', '4', '1', '5', 'content', '7', 'HL'],
            ['gardien du temple', '10', '30', '4', '4', '0', '4', '4', '1', '2', '2', '8', 'content', '14', 'HL'],
            ['nuees dees jungles', '2', '30', '5', '3', '0', '2', '2', '5', '1', '5', '10', 'content', '35', 'HL'],
            ['skinks cameleons', '5', '30', '5', '2', '4', '3', '2', '1', '4', '1', '5', 'content', '13', 'HL'],
            ['monteurs de sang-froid', '5', '50', '4', '4', '0', '4', '4', '1', '2', '2', '8', 'content', '30', 'HL'],
            ['kroxigor', '3', '50', '6', '3', '0', '5', '4', '3', '1', '3', '7', 'content', '50', 'HL'],
            ['monteurs de teradon', '3', '30', '6', '2', '3', '3', '2', '1', '4', '1', '5', 'content', '35', 'HL'],
            ['stegadon', '1', '1', '6', '3', '0', '5', '6', '5', '2', '4', '6', 'content', '215', 'HL'],
            ['bastiladon', '1', '1', '4', '3', '0', '4', '5', '4', '1', '3', '6', 'content', '150', 'HL'],
            ["monteurs d'enterodactyle", '3', '30', '6', '2', '3', '3', '2', '1', '4', '1', '5', 'content', '40', 'HL'],
            ['stegadon ancestral', '1', '1', '6', '3', '0', '6', '6', '5', '1', '3', '6', 'content', '230', 'HL'],
            ['meutes de chasse de salamandres', '1', '30', '6', '3', '3', '5', '4', '3', '4', '2', '4', 'content', '80', 'HL'],
            ['meutes de chasse de razordons', '1', '30', '6', '3', '3', '5', '4', '3', '4', '2', '4', 'content', '65', 'HL'],
            ['troglodon', '1', '1', '7', '3', '3', '5', '5', '5', '2', '3', '5', 'content', '200', 'HL'],

            ['Seigneur Orc sauvage', '1', '1', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'content', '50', 'OG'],
            ['Seigneur Or', '1', '1', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'content', '50', 'OG'],
            ['Seigneur Orc noir', '1', '1', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'content', '50', 'OG'],
            ['Seigneur Gobelin de la nuit', '1', '1', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'content', '50', 'OG'],

            ['Seigneur Vampire', '1', '1', '4', '10', '5', '6', '5', '3', '6', '5', '10', 'content', '200', 'CV'],
            ['Comte von karstein', '1', '1', '4', '10', '5', '6', '5', '3', '6', '5', '10', 'content', '200', 'CV'],
            ['Terreurgheist', '1', '1', '4', '10', '5', '6', '5', '3', '6', '5', '10', 'content', '200', 'CV'],
            ['Machine Mortis', '1', '1', '4', '10', '5', '6', '5', '3', '6', '5', '10', 'content', '200', 'CV']
        ];

        foreach ($arrayfigurine as $fig)
        {
            $figObj = new Figurine();
            $figObj->setName($fig[0]);
            $figObj->setNumber($fig[1]);
            $figObj->setMaxnumber($fig[2]);
            $figObj->setM($fig[3]);
            $figObj->setCc($fig[4]);
            $figObj->setCt($fig[5]);
            $figObj->setF($fig[6]);
            $figObj->setE($fig[7]);
            $figObj->setPv($fig[8]);
            $figObj->setI($fig[9]);
            $figObj->setA($fig[10]);
            $figObj->setCd($fig[11]);
            $figObj->setContent($fig[12]);
            $figObj->setCost($fig[13]);
            $figObj->setListBuilderFaction($this->getReference($fig[14]));
            $manager->persist($figObj);
            $this->addReference($fig[0], $figObj);
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
        return 2;
    }

}