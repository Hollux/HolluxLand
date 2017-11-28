<?php
namespace HolluxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;

class RegisterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
            ->add('login', Type\TextType::class, ['attr' => ['class' => 'form-control']])
			->add('password', Type\PasswordType::class, ['attr' => ['class' => 'form-control']])
			->add('email', Type\EmailType::class, ['attr' => ['class' => 'form-control']])
			->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']]);
	}

	public function getName()
	{
		return 'UserBundle_user';
	}
}