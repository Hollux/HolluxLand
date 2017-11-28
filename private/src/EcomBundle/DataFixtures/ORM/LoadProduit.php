<?php

namespace EcomBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use EcomBundle\Entity\Produit;

class LoadProduit extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $arrayproduit =  [
        "apple"=> ['Cora', 'bio'],
        "apricot"=> ['Cora', 'bio'],
        "avocado"=> ['Cora', 'bio'],
        "banana"=> ['Cora', 'bio'],
        "bell pepper"=> ['Cora', 'bio'],
        "bilberry"=> ['Cora', 'bio'],
        "blackberry"=> ['Cora', 'bio'],
        "blackcurrant"=> ['Cora', 'bio'],
        "blood orange"=> ['Cora', 'bio'],
        "blueberry"=> ['Cora', 'bio'],
        "boysenberry"=> ['Cora', 'bio'],
        "breadfruit"=> ['Cora', 'bio'],
        "canary melon"=> ['Cora', 'OGM'],
        "cantaloupe"=> ['Cora', 'OGM'],
        "cherimoya"=> ['Cora', 'OGM'],
        "cherry"=> ['Cora', 'OGM'],
        "chili pepper"=> ['Cora', 'OGM'],
        "clementine"=> ['Cora', 'OGM'],
        "cloudberry"=> ['Cora', 'OGM'],
        "coconut"=> ['Cora', 'OGM'],
        "cranberry"=> ['Cora', 'OGM'],
        "cucumber"=> ['Cora', 'OGM'],
        "currant"=> ['Cora', 'OGM'],
        "damson"=> ['Cora', 'OGM'],
        "date"=> ['Cora', 'OGM'],
        "dragonfruit"=> ['Cora', 'OGM'],
        "durian"=> ['Cora', 'OGM'],
        "eggplant"=> ['Lidl', 'OGM'],
        "elderberry"=> ['Lidl', 'OGM'],
        "feijoa"=> ['Lidl', 'OGM'],
        "fig"=> ['Lidl', 'OGM'],
        "goji berry"=> ['Lidl', 'OGM'],
        "gooseberry"=> ['Lidl', 'OGM'],
        "grape"=> ['Lidl', 'OGM'],
        "grapefruit"=> ['Lidl', 'OGM'],
        "guava"=> ['Lidl', 'OGM'],
        "honeydew"=> ['Lidl', 'pesticide'],
        "huckleberry"=> ['Lidl', 'pesticide'],
        "jackfruit"=> ['Lidl', 'pesticide'],
        "jambul"=> ['Lidl', 'pesticide'],
        "jujube"=> ['Lidl', 'pesticide'],
        "kiwi fruit"=> ['Lidl', 'pesticide'],
        "kumquat"=> ['Lidl', 'pesticide'],
        "lemon"=> ['Lidl', 'pesticide'],
        "lime"=> ['Lidl', 'pesticide'],
        "loquat"=> ['Lidl', 'pesticide'],
        "lychee"=> ['Lidl', 'pesticide'],
        "mandarine"=> ['Lidl', 'pesticide'],
        "mango"=> ['aldi', 'pesticide'],
        "mulberry"=> ['aldi', 'pesticide'],
        "nectarine"=> ['aldi', 'pesticide'],
        "nut"=> ['aldi', 'pesticide'],
        "olive"=> ['aldi', 'pesticide'],
        "orange"=> ['aldi', 'pesticide'],
        "pamelo"=> ['aldi', 'pesticide'],
        "papaya"=> ['aldi', 'bio'],
        "passionfruit"=> ['aldi', 'bio'],
        "peach"=> ['aldi', 'bio'],
        "pear"=> ['aldi', 'bio'],
        "persimmon"=> ['aldi', 'bio'],
        "physalis"=> ['aldi', 'bio'],
        "pineapple"=> ['aldi', 'bio'],
        "plum"=> ['aldi', 'bio'],
        "pomegranate"=> ['aldi', 'bio'],
        "pomelo"=> ['aldi', 'bio'],
        "purple mangosteen"=> ['aldi', 'bio'],
        "quince"=> ['aldi', 'bio'],
        "raisin"=> ['aldi', 'bio'],
        "rambutan"=> ['aldi', 'OGM'],
        "raspberry"=> ['aldi', 'OGM'],
        "redcurrant"=> ['aldi', 'OGM'],
        "rock melon"=> ['aldi', 'OGM'],
        "salal berry"=> ['aldi', 'OGM'],
        "satsuma"=> ['super U', 'OGM'],
        "star fruit"=> ['super U', 'OGM'],
        "strawberry"=> ['super U', 'OGM'],
        "tamarillo"=> ['super U', 'OGM'],
        "tangerine"=> ['super U', 'OGM'],
        "tomato"=> ['super U', 'OGM'],
        "ugli fruit"=> ['super U', 'OGM'],
        "watermelon"=> ['super U', 'OGM']
    ];


        foreach ($arrayproduit as $key => $produit)
        {
            $produitObj = new Produit();
            $produitObj->setName($key);
            $produitObj->setPrice(mt_rand(1, 20));
            $produitObj->setMagasin($produit[0]);
            $produitObj->setType($produit[1]);
            $manager->persist($produitObj);
        }

        $manager->flush();
    }

/*  public function getOrder()
    {
        return 1;
    }*/

}