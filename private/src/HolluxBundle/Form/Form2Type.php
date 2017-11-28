<?php
namespace HolluxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints as Assert;

class Form2Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', Type\TextType::class,
               ['label' => 'Ton prenom',
                'attr' => ['class' => 'form-control',
                            'data-fdp' => 'prenom connard',
                            'placeholder' => 'mets ton blaz ici pd'],
                'required' => false,
               ])
            ->add('nom', Type\TextType::class,
                ['label' => 'Ton nom ! *',
                    'attr' => ['class' => 'form-control',
                        'data-fdp' => 'nom enfoiré'],
                    'required' => true,
                    'data' => 'Toretto'
                ])
        ;
    }

}