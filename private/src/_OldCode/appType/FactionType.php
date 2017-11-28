<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FactionType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name', Type\HiddenType::class)
			->add('select', Type\CheckboxType::class, array('label' => 'name',
			                                                'mapped' => false,
			                                                'required' => false,
															'attr' => array( 'checked'   => 'checked')));
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(['data_class' => 'AppBundle\Entity\Faction',]);
	}

	public function getName()
	{
		return 'AppBundle_smashUp';
	}
}