<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type;

class ForumType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('title', TextType::class)->add('content', TextType::class)
			->add('envoyer', type\SubmitType::class);
	}

	public function getName()
	{
		return 'AppBundle_Forum';
	}
}