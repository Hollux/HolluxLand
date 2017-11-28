<?php
namespace ListBuilderBundle\Form;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use ListBuilderBundle\Entity\Option;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListFiguOptionsType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $idfigurine = $options['data']->getFigurine();

        $figurine = $this->em->getRepository('ListBuilderBundle:Figurine')->findOneById($idfigurine);

        $optionDiscipline = null;
        foreach($figurine->getFigurineoptions() as $option)
        {

            $array[$option->getOptiontype()->getType()][] = $option;
        }
        if(isset($array['disciplines des anciens'])) {
            foreach ($options['data']->getOptions() as $optionFig) {
                foreach ($array['disciplines des anciens'] as $option) {
                    if($optionFig == $option)
                        $optionDiscipline = $option;
                }
                /*foreach ($array['objets magiques'] as $option) {
                    if($optionFig == $option)
                        $optionObjetMagique = $option;
                }*/
            }
        }

        $builder->addEventListener(FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $formData = $event->getForm()->getData();
                foreach ($formData->getOptions() as $option) {
                    $formData->removeOption($option);
                }
            }
        );

        if(isset($array['disciplines des anciens']))
        {
            $this->addSubOptions($builder, 'discipline', $array['disciplines des anciens'], ['class' => 'ListBuilderBundle:Option',
                    'mapped' => false,
                    'choices' => $array['disciplines des anciens'],
                    'data' => $optionDiscipline,
                    'choice_label' => function(Option$entity) {
                            return $entity->getName().' - '. $entity->getCost().'pts';
                     },
                    'placeholder' => '',
                    'attr' => ['class' => 'form-control']]);
        }

        if(isset($array['objets magiques']))
        {
            $this->addSubOptions($builder,
                'magicobject',
                $array['objets magiques'],
                [   'class' => 'ListBuilderBundle:Option',
                    'mapped' => false,
                    'expanded' => true,
                    'choices' => $array['objets magiques'],
                    'multiple' => true,
                    'data' => $options['data']->getOptions(),
                    'choice_label' => function(Option$entity) {
                        return $entity->getName().' - '. $entity->getCost().'pts';
                    },
                    'attr' => ['class' => 'radio-inline']
                ]);

        }

        $builder
            ->add('submit', Type\SubmitType::class, ['attr' => ['class' => 'btn btn-primary']]);

    }

    private function addSubOptions($builder, $name, $optionData, $options)
    {
        $builder
            ->add($name, EntityType::class, $options)
            ->get($name)->addEventListener(
                FormEvents::PRE_SUBMIT,
                function (FormEvent $event) use ($optionData) {
                    // It's important here to fetch $event->getForm()->getData(), as
                    // $event->getData() will get you the client data (that is, the ID)
                    $data = $event->getData();
                    if(!is_array($data))
                        $data = [$data];

                    foreach ($optionData as $optionDatum) {
                        foreach($data as $key=> $datum) {
                            if(!is_object($datum) && $datum == $optionDatum->getId()) {
                                $event->getForm()->getParent()->getData()->addOption($optionDatum);
                            }
                        }
                    }
                }
            );
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'ListBuilderBundle\Entity\List_Figurine']);
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

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     *
     * @deprecated Deprecated since Symfony 2.8, to be removed in Symfony 3.0.
     *             Use the fully-qualified class name of the type instead.
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }
}