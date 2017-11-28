<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints as Assert;

class MeContacterType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('email', Type\EmailType::class, ['label' => "Votre email",
		                                               'attr' => ['class' => 'form-info']])
			->add('content', Type\TextareaType::class,
				['constraints' => [new Assert\NotBlank()], 'attr' => [ 'class' => 'form-control',
				                                                       'rows' => '5']])
			->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']])
		;
	}

	public function getName()
	{
		return 'meContacterHolluxBundle_mecontacter';
	}
}