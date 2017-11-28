<?php
namespace Admin\NavBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;

class NavcreateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', Type\TextType::class, ['attr' => ['class' => 'form-control'], 'label' => 'Nom dans le menu'])
            ->add('url', Type\TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('title', Type\TextType::class, ['attr' => ['class' => 'form-control'], 'label' => 'Titre de la page'])
            ->add('page', Type\TextareaType::class, ['required' => false, 'attr' => ['class' => 'form-control wysiwyg hide'], 'label' => 'Contenu'])
            ->add('ordre', Type\IntegerType::class, ['attr' => ['class' => 'form-control']])
            ->add('isvisible', Type\CheckboxType::class, ['attr' => ['class' => 'form-control', 'checked' => 'checked'], 'label' => 'Visible ?'])
            ->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-success']])
        ;
    }

    public function getName()
    {
        return 'AdminNavcreate_user';
    }

}