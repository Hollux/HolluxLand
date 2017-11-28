<?php
namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use AppBundle\Form\Tools\ReCaptchaType;

class SuperRegisterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $builder ->add('name', Type\TextType::class, ['label' => 'Name(pseudo)', 'attr' => ['class' => 'form-control']])
		         ->add('login', Type\EmailType::class, ['label' => 'Login(email)', 'attr' => ['class' => 'form-control']])
                 ->add('password', Type\PasswordType::class, ['attr' => ['class' => 'form-control']])
                ->add('recaptcha', ReCaptchaType::class,
                ['label' => false, 'mapped' => false])
        ;
	}

	public function getName()
	{
		return 'UserBundle_user';
	}
}