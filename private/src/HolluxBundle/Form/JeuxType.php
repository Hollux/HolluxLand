<?php
namespace HolluxBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JeuxType extends AbstractType
{
	protected $em;
	protected $tokenStorage;

	public function __construct(EntityManager $em, TokenStorageInterface $tokenStorage)
	{
		$this->em           = $em;
		$this->tokenStorage = $tokenStorage;
	}

	public function tokenJeux(UserInterface $author)
	{
		if(!$author->getNombreJeux()) {
			$user = $author->setnombreJeux("jeux_1");
			$this->em->persist($user);
			$this->em->flush();
		}
		$tokenJeux = $author->getNombreJeux();

		return $tokenJeux;
	}

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('question', Type\CollectionType::class,
			['entry_type'   => QuestionType::class]);
	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(['data_class' => 'HolluxBundle\Entity\Jeux',]);
	}

	public function getName()
	{
		return 'HolluxBundle_Jeux';
	}
}