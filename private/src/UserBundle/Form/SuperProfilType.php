<?php
namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;

class SuperProfilType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('login', Type\EmailType::class, ['attr' => ['class' => 'form-control']]);
	}

	public function getName()
	{
		return 'UserBundle_user';
	}
}