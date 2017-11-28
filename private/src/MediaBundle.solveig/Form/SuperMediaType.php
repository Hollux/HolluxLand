<?php
namespace MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;

class SuperMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', Type\FileType::class,
            ['required' => false, 'data_class' => null, 'attr' => ['class' => 'form-control input-inline',]]);
    }

    public function getName()
    {
        return 'MediaBundle_media';
    }
}