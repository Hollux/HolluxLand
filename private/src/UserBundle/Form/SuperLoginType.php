<?php
namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type;

class SuperLoginType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('login', TextType::class, ['attr' => ['class' => '_username']])
			->add('password', Type\PasswordType::class)
		;
	}

	public function getName()
	{
        /*->add('mail', Type\EmailType::class)*/
		return 'UserBundle_user';
	}
}