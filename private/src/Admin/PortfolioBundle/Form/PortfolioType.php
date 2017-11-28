<?php
namespace Admin\PortfolioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;
use MediaBundle\Form\MediaType;
use Doctrine\ORM\EntityRepository;

class PortfolioType extends AbstractType
{
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data = $this->em->getRepository('PortfolioBundle:TypePortfolio')->findAll();

        $builder
            ->add('title', Type\TextType::class, ['attr' => ['class' => 'form-control', 'maxlength' => 255]])
            //Choice ENTITY
            ->add('type', EntityType::class, ['class' => 'PortfolioBundle:TypePortfolio',
                'choices' => $data, 'choice_label' => 'type', 'attr' => ['class' => 'form-control']])
            // /Choice ENTITY
            ->add('shortcontent', Type\TextType::class, ['attr' => ['class' => 'form-control', 'maxlength' => 255]])
            // TODO: PAS LE BON MEDIATYPE
            ->add('media', MediaType::class)
            ->add('content', Type\TextareaType::class, ['required' => false, 'attr' => ['class' => 'form-control wysiwyg hide']])
            ->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']]);


       /* ->add(
        'side',
        EntityType::class,
        [
            'class' => Entity\Side::class,
            'query_builder' => function (EntityRepository $er) {
                $qb = $er->createQueryBuilder('s');
                $qb->where(
                    $qb->expr()->in(
                        's.id',
                        [Entity\Side::GOOD, Entity\Side::BAD]
                    )
                );
                return $qb;
            },
            'choice_label' => 'name',
            'label' => 'form.side'
        ]
    )*/

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'Admin\PortfolioBundle\Entity\Portfolio']);
    }

    public function getName()
    {
        return 'Bundle_PortfolioType';
    }

    /*->add('media', Type\CollectionType::class, [
'entry_type'   => MediaType::class,
'error_bubbling' => false,
'allow_add'    => false,
'allow_delete' => false
])*/
}