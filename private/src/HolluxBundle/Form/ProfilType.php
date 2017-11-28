<?php
namespace HolluxBundle\Form;

use UserBundle\Form\SuperProfilType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use MediaBundle\Form\MediaType;


class ProfilType extends SuperProfilType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder, $options);
        $builder->add('avatar', MediaType::class,
            ['required' => false,  'data_class'  => 'HolluxBundle\Entity\Media' , 'attr' => ['class' => 'form-control input-inline',]]);

        /*$builder->add('mail', Type\EmailType::class);*/


        /*->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']])*/

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'HolluxBundle\Entity\User']);
    }

    public function getName()
    {
        return 'Bundle_ProfilType';
    }
}