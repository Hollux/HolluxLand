<?php
namespace MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', Type\FileType::class,
            ['required' => false, 'attr' => ['class' => 'form-control input-inline',]]);
    }

/*    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'HolluxBundle\Entity\Media']);
    }*/

    public function getName()
    {
        return 'MediaBundle_media';
    }
}