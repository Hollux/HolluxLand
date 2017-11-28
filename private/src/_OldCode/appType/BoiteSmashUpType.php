<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BoiteSmashUpType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('name', Type\HiddenType::class, array('label' => 'Libelle : '))
			->add('select', Type\CheckboxType::class, array('label' => 'name',
			                                                'mapped' => false,
															'required' => false,
			                                                'attr' => array( 'checked'   => 'checked')))
			->add('faction', Type\CollectionType::class,
				['entry_type'   => FactionType::class, 'error_bubbling' => false, 'allow_add' => false,
				 'allow_delete' => false]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(['data_class' => 'AppBundle\Entity\BoiteSmashUp',]);
	}

	public function getName()
	{
		return 'AppBundle_smashUp';
	}
}