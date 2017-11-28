<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('file', Type\FileType::class,
			['required' => false, 'data_class' => null, 'attr' => ['class' => 'form-control input-inline',]])
			->add('mail', Type\EmailType::class, ['attr' => ['class' => 'form-control']])
			->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']]);
	}

/*	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(['data_class' => 'AppBundle\Entity\User']);
	}*/

	public function getName()
	{
		return 'UserBundle_user';
	}
}