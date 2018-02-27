<?php

namespace EcomBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\RouterInterface;
use ListBuilderBundle\Entity\Liste;
use ListBuilderBundle\Entity\List_Figurine;

class LoadListBuilder_ListExemple extends AbstractFixture implements OrderedFixtureInterface
{
    Const figurines = [
        ['pretre-mage slann', 'options' => self::pretreOptions],
        ['sang ancien saurus', 'options' => self::sangUnOptions],
        ['sang ancien saurus', 'options' => self::sangDeuxOptions],
        ['gardien du temple'],
        ['guerriers saurus'],
        ['guerriers saurus'],
        ['tirailleurs skinks'],
        ['tirailleurs skinks'],
        ['tirailleurs skinks'],
        ['monteurs de teradon'],
        ['stegadon ancestral'],
        ['meutes de chasse de salamandres'],
        ['meutes de chasse de salamandres'],
        ['troglodon']
    ];

    Const pretreOptions = ['convergence harmonique', 'banniere en peau de skaven'];
    Const sangUnOptions = ['banniere du jaguar'];
    Const sangDeuxOptions = ['manteau de plumes', 'oeuf de quango'];

    //TODO: probleme dans la fixture au niveau du setAuthor
    public function load(ObjectManager $manager)
    {
        // Création de la liste
        $listExemple = New Liste();
        $listExemple->SetId('1');
        $listExemple->setIsSubmited(1);
        $listExemple->setIsvisible(1);
       // $listExemple->setAuthor("anon.");
        $listExemple->SetTitle('Liste Exemple');
        $listExemple->SetContent('Liste réalisé avec des fixtures afin d\' avoir un exemple constant. merci de ne pas la détruire');
        $listExemple->setType($this->getReference('Test'));

        $manager->persist($listExemple);
        $manager->flush();

        $this->addReference('listExemple', $listExemple);

        // Création des tables intermédiaire
        foreach(self::figurines as $figurine)
        {
            $listFig = new List_Figurine();
            $listFig->setFigurine($this->getReference($figurine[0]));
            $listFig->setList($this->getReference('listExemple'));
            if(isset($figurine['options']) == true){
                foreach ($figurine['options'] as $objet)
                $listFig->addOption($this->getReference('objet_'.$objet));
            }
            $manager->persist($listFig);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }


}