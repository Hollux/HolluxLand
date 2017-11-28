<?php
namespace HolluxBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class Form8Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', Type\TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('price', Type\IntegerType::class, ['attr' => ['class' => 'form-control']])


            ->add('magasins', Type\CollectionType::class, [
                'entry_type' => MagType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'attr' => array(
                    'class' => 'my-selector',
                ),
            ])


            ->add('type', Type\ChoiceType::class, [
                'attr' => ['class' => 'form-control'],
                'placeholder' => '',
                'choices' => [
                    'cadavre' => 'viande',
                    'poisson' => 'poisson',
                    'fruits' => 'fruits',
                    'xxxx' => 'legume',
                    'pains' => 'pains',
                    'frais' => 'frais',
                    'truc glacé' => 'surgelés',
                    'petits pains ou chocolatine ?' => 'epicerie',
                    'bière' => 'boissons',
                    'produits pour les filles' => 'hygiène',
                    'future cadavre' => 'animalerie',
                    'fringue' => 'textile']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'HolluxBundle\Entity\Produit3'
        ]);
    }

}