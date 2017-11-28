<?php
namespace Admin\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints as Assert;

class TypePortfolioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', Type\TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('shorttypecontent', Type\TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-success']]);;
    }

    public function getName()
    {
        return 'AdminPortfolioBundle_typeportefolio';
    }
}