<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type;

class LoginType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name', TextType::class, ['attr' => ['class' => '_username']])
			->add('password', Type\PasswordType::class)
			->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']])
		;
	}

	public function getName()
	{
		return 'UserBundle_user';
	}
}