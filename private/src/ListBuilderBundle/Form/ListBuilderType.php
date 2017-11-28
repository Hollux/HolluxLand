<?php
namespace ListBuilderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListBuilderType extends AbstractType
{
    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $type = $this->em->getRepository('ListBuilderBundle:ListType')->findAll();

        $builder
            ->add('title', Type\TextType::class, ['attr' => ['class' => 'form-control',
                                                    'maxlength' => 255,
                                                    'placeholder' => 'Nom :']])
            ->add('type', EntityType::class, [
                'class' => 'ListBuilderBundle:ListType',
                'choices' => $type,
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control'],
                'placeholder' => 'Type :'
            ])
            ->add('isvisible', Type\CheckboxType::class, ['attr' => ['data-toggle' => 'toggle',
                                                                    'type' => 'checkbox',
                                                                    'data-onstyle' => 'success',
                                                                    'data-offstyle' => 'danger',
                                                                    'data-on' => 'public',
                                                                    'data-off' => 'private']])

            ->add('content', Type\TextareaType::class, ['required' => false, 'attr' => ['class' => 'form-control wysiwyg hide']])
            ->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'ListBuilderBundle\Entity\Liste']);
    }

    public function getName()
    {
        return 'Bundle_ListBuilderType';
    }

    /**
     * Sets the default options for this type.
     *
     * @param OptionsResolverInterface $resolver The resolver for the options.
     *
     * @deprecated since version 2.7, to be renamed in 3.0.
     *             Use the method configureOptions instead. This method will be
     *             added to the FormTypeInterface with Symfony 3.0.
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        // TODO: Implement setDefaultOptions() method.
    }
}