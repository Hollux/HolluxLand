<?php
namespace HolluxBundle\Form;

use UserBundle\Form\SuperLoginType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type;

class LoginType extends SuperLoginType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        parent::buildForm($builder, $options);

        /*$builder->add('mail', Type\EmailType::class);*/


        /*->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']])*/

    }
}