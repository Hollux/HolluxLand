<?php
namespace NewsBundle\Form;

use NewsBundle\Entity\News;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', Type\TextType::class, ['label' => "Title",
            'attr' => ['class' => 'form-control']])
            ->add('content', Type\TextareaType::class,
                [   'label' => 'Content',
                    'attr' => [ 'class' => 'form-control',
                        'rows' => '5']])
            ->add('isvisible', Type\CheckboxType::class,
                   [ 'label' => 'Visible',
                    'attr' => [ 'checked'   => 'checked']])
            ->add('submit', Type\SubmitType::class,
                ['attr' => [
                    'class' => 'btn btn-primary']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => News::class]);
    }
}