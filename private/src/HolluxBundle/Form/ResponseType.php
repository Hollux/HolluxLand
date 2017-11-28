<?php
namespace HolluxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResponseType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('response', Type\TextType::class)->add('question', QuestionNumberType::class)
			->add('tokenJeux', TokenType::class);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(['data_class' => 'HolluxBundle\Entity\Response',]);
	}

	public function getName()
	{
		return 'response';
	}
}