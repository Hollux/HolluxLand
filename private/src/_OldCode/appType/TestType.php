<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('text', Type\TextareaType::class,
				['label' => "Text test", 'attr' => ['class' => 'form-control', 'rows' => '5']])
			->add('submit', Type\SubmitType::class, ['attr' => ["class" => 'btn btn-success']]);
	}

	public function getName()
	{
		return 'AppBundle_TestController';
	}
}