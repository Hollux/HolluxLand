<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('question', Type\HiddenType::class)->add('response', Type\CollectionType::class,
			['entry_type'   => ResponseType::class, 'error_bubbling' => false, 'allow_add' => false,
			 'allow_delete' => false]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(['data_class' => 'AppBundle\Entity\Question',]);
	}

	public function getName()
	{
		return 'question';
	}
}