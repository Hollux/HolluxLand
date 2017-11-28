<?php
namespace HolluxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Form\Tools\ReCaptchaType;

class MeContacterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('email', Type\EmailType::class, ['label' => "Votre email",
		                                         'attr' => ['class' => 'form-info']])
			->add('content', Type\TextareaType::class,
				['constraints' => [new Assert\NotBlank()], 'attr' => [ 'class' => 'form-control',
				                                                       'rows' => '5']])
            ->add('recaptcha', ReCaptchaType::class,
                ['label' => false])
		;
	}

	public function getName()
	{
		return 'meContacterHolluxBundle_mecontacter';
	}
}