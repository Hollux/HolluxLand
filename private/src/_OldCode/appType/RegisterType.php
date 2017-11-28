<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use AppBundle\Form\Tools\ReCaptchaType;

class RegisterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('name', Type\TextType::class, ['attr' => ['class' => 'form-control']])
			->add('password', Type\PasswordType::class, ['attr' => ['class' => 'form-control']])
			->add('mail', Type\EmailType::class, ['attr' => ['class' => 'form-control']])
            ->add('recaptcha', ReCaptchaType::class,
                ['label' => false])
        ;
	}

	public function getName()
	{
		return 'UserBundle_user';
	}
}