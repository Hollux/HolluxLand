<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SmashUpType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('nbrJoueurs', Type\ChoiceType::class,
				['choices' => [2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6], 'mapped' => false,
				 'label'   => 'Nombre de Joueurs :'])
			->add('boites', Type\CollectionType::class,
				['entry_type'   => BoiteSmashUpType::class, 'error_bubbling' => false, 'allow_add' => false,
				 'allow_delete' => false])
			->add('submit', Type\SubmitType::class, ['attr' => ["class" => 'btn btn-success']]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(['data_class' => 'AppBundle\Entity\SmashUp',]);
	}

	public function getName()
	{
		return 'AppBundle_smashUp';
	}
}