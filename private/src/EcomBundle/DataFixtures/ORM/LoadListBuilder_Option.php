<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ListBuilderBundle\Entity\Option;

class LoadListBuilder_Option extends AbstractFixture implements OrderedFixtureInterface
{
    //['nom', 'content', 'basic', 'cost', 'type', 'figs' => ['fig']],
    //disciplines des anciens
    //pretre-mage slann
    public function load(ObjectManager $manager)
    {
        $arrayOption = [
            //disciplines des anciens
            ["reservoir d'energie mystique", 'content', '0', '20', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["ame de marbre", 'content', '0', '25', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["aphorisme apaisant", 'content', '0', '25', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["reflexions vagabondes", 'content', '0', '30', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["convergence harmonique", 'content', '0', '30', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["regarde penetrant", 'content', '0', '30', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["guerison transcendantale", 'content', '0', '30', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["presence surnaturelle", 'content', '0', '30', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["connaissance des mysteres", 'content', '0', '35', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],
            ["etat superieur de conscience", 'content', '0', '60', 'disciplines des anciens',
                'figs' => ['pretre-mage slann']],

            //objets magiques
            ['lame des realites multiples', 'content', '0', '100', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],
            ['lame piranha', 'content', '0', '50', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],
            ["heaume sacre du stegadon d'itza", 'content', '0', '40', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],
            ['banniere en peau de skaven', 'content', '0', '65', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],
            ['banniere du jaguar', 'content', '0', '50', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],
            ['cube de tenebres', 'content', '0', '30', 'objets magiques',
                'figs' => ['pretre-mage slann']],
            ['plaque de domination', 'content', '0', '25', 'objets magiques',
                'figs' => ['pretre-mage slann']],
            ['manteau de plumes', 'content', '0', '35', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],
            ['cor de kygor', 'content', '0', '35', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],
            ['oeuf de quango', 'content', '0', '30', 'objets magiques',
                'figs' => ['pretre-mage slann', 'sang ancien saurus']],

            //armes
            ['arme de base additionnelle', 'content', '0', '3', 'arme',
                'figs' => ['sang ancien saurus']],
            ['hallebarde', 'content', '0', '3', 'arme',
                'figs' => ['sang ancien saurus']],
            ['lance', 'content', '0', '3', 'arme',
                'figs' => ['sang ancien saurus']],
            ['arme lourde', 'content', '0', '6', 'arme',
                'figs' => ['sang ancien saurus']],
            ['arme de base', 'content', '1', '0', 'arme',
                'figs' => ['sang ancien saurus']],

            //armure
            ['armure legere', 'content', '0', '9', 'armure', 'figs' => ['sang ancien saurus']],

            //bouclier
            ['bouclier', 'content', '0', '6', 'bouclier', 'figs' => ['sang ancien saurus']],

            //monture
            ['sang-froid', 'content', '0', '30', 'monture', 'figs' => ['sang ancien saurus']],
            ['carnosaure', 'content', '0', '220', 'monture', 'figs' => ['sang ancien saurus']]

            /*['nom', 'content', 'basic', 'cost', 'type', 'figs' => ['fig']],
            ['Plaque divine', 'Seigneur Slann', 'content', '40' ],
            ['Orbe', 'Seigneur Slann', 'content', '50' ],
            ['Parchemin de divination', 'Pretre Skink', 'content', '25' ],
            ['Peinture de guerre', 'Seigneur Orc sauvage', 'content', '5' ],
            ['Surarmement', 'Seigneur Orc noir', 'content', '20' ],
            ['Chaman de niveau 4', 'Chaman Orc', 'content', '35' ],
            ['Loup de guerre', 'Seigneur Gobelin de la nuit', 'content', '40' ],
            ['Arme lourde', 'Seigneur Vampire', 'content', '10' ],
            ['Soif de sang', 'Seigneur Vampire', 'content', '50' ],
            ['Cape de sang', 'Seigneur Vampire', 'content', '45' ],
            ['Plaque de guerre', 'Terreurgheist', 'content', '20' ],
            ['Courtisane', 'Machine Mortis', 'content', '10' ],
            ['Chaudron de sang', 'Machine Mortis', 'content', '30' ],
            ['Banshee', 'Machine Mortis', 'content', '30' ]*/
        ];

        foreach ($arrayOption as $option)
        {
            $optionObj = new Option();
            $optionObj->setName($option[0]);
            $optionObj->setContent($option[1]);
            $optionObj->setBasic($option[2]);
            $optionObj->setCost($option[3]);
            $optionObj->setOptiontype($this->getReference($option[4]));
            foreach($option['figs'] as $fig)
            {
                $optionObj->addFigurine($this->getReference($fig));
            }
            $manager->persist($optionObj);
            $this->addReference('objet_'.$option[0], $optionObj);
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
        return 3;
    }

}