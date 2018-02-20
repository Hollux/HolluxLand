<?php
namespace EcomBundle\DataFixtures\ORM;

use AppBundle\Entity\Departement;
use AppBundle\Entity\Region;
use AppBundle\Entity\Ville;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadDepartementRegionVille3 extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $region = [];
        $departement = [];
        $ville = [];

        if (($handle = fopen("../private/var/france.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);

                for ($c = 0; $c < $num; $c++) {
                    $ligne = explode(";", $data[$c]);

                    if (isset($ligne[2])) {
                        if ($ligne[1] >= 26 && $ligne[1] <= 52) {
                            if (!in_array('region' . $ligne[1], $region)) {
                                if ($ligne[2] != " ") {
                                    $regi = new Region();
                                    $regi->setName($ligne[2]);
                                    $regi->setCode($ligne[1]);
                                    $manager->persist($regi);
                                    $this->addReference('region' . $ligne[1], $regi);
                                    $region[] = 'region' . $ligne[1];
                                }
                            };
                            if ($ligne[2] == 'Lorraine') {
                                if (isset($ligne[5])) {
                                    $ligne[5] = 'Departement';
                                    $ligne[4] = '57';
                                    if (!in_array('dep' . $ligne[4], $departement)) {
                                        if ($ligne[5] != " ") {
                                            $dep = new Departement();
                                            $dep->setName($ligne[5]);
                                            $dep->setCode($ligne[4]);
                                            $dep->setRegion($this->getReference('region' . $ligne[1]));
                                            $manager->persist($dep);
                                            $this->addReference('dep' . $ligne[4], $dep);
                                            $departement[] = 'dep' . $ligne[4];
                                        }
                                    };
                                    if (isset($ligne[8])) {
                                        $ligne[8] = 'Ville';
                                        $ligne[9] = '57000';
                                        if (!in_array('vil' . $ligne[9], $ville)) {
                                            if ($ligne[5] != " ") {
                                                $vil = new Ville();
                                                $vil->setName($ligne[8]);
                                                $vil->setCode($ligne[9]);
                                                $vil->setDepartement($this->getReference('dep' . $ligne[4]));
                                                $manager->persist($vil);
                                                $this->addReference('vil' . $ligne[9], $vil);
                                                $ville[] = 'vil' . $ligne[9];
                                            }
                                        };
                                    }
                                }
                                break;
                            }

                            if (isset($ligne[5])) {
                                if (!in_array('dep' . $ligne[4], $departement)) {
                                    if ($ligne[5] != " ") {
                                        $dep = new Departement();
                                        $dep->setName($ligne[5]);
                                        $dep->setCode($ligne[4]);
                                        $dep->setRegion($this->getReference('region' . $ligne[1]));
                                        $manager->persist($dep);
                                        $this->addReference('dep' . $ligne[4], $dep);
                                        $departement[] = 'dep' . $ligne[4];
                                    }
                                };
                                if (isset($ligne[8])) {
                                    //$ligne[9] = substr($ligne[9], 0, 5);
                                    //if(!in_array('vil'.$ligne[9], $ville)){
                                    if ($ligne[5] != " ") {
                                        $vil = new Ville();
                                        $vil->setName($ligne[8]);
                                        $vil->setCode($ligne[9]);
                                        $vil->setDepartement($this->getReference('dep' . $ligne[4]));
                                        $manager->persist($vil);
                                        //$this->addReference('vil'.$ligne[9], $vil);
                                        $ville[] = 'vil' . $ligne[9];
                                    }
                                    // };
                                }
                            }
                        }


                    }
                }
            }
            fclose($handle);

            $manager->flush();

        }

    }

    public function getOrder()
    {
        return 3;
    }
}