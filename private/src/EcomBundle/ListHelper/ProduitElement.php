<?php
namespace EcomBundle\ListHelper;

use ListHelperBundle\Component\BuilderInterface;
use ListHelperBundle\Component\Element\ListElement;


class ProduitElement extends ListElement
{
    public function buildList(BuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('name')
            ->add('price')
            ->add('magasin')
            ->add('type');
    }

}