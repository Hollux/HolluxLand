<?php
/**
 * Created by PhpStorm.
 * User: amarchan
 * Date: 10/07/2017
 * Time: 11:32
 */

namespace HolluxBundle\Form;


use AppBundle\Entity\Departement;
use AppBundle\Entity\Region;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VetFormTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('region', EntityType::class, [
                'class' => 'AppBundle\Entity\Region',
                'placeholder' => 'Selectionnez votre région',
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
        ;

        $builder->get('region')->addEventListener(
            FormEvents::POST_SUBMIT,
            function(FormEvent $event)
            {
                $form = $event->getForm();
                $this->addDepartementField($form->getParent(),$form->getData());

            }
        );
        $builder->addEventListener(
            FormEvents::POST_SET_DATA,
            function(FormEvent $event) {
                $data = $event->getData();
                $ville = $data->getVille();
                if($ville) {
                    $form = $event->getForm();
                    $departement = $ville->getDepartement();
                    $region = $departement->getRegion();
                    $this->addDepartementField($form, $region);
                    $this->addVilleField($form, $departement);
                    $form->get('region')->setData($region);
                    $form->get('departement')->setData($departement);
                }
            }
        );

    }

    private function addDepartementField(FormInterface $form, Region $region = null)
    {
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'departement',
            EntityType::class,
            null,
            [
                'class' => 'AppBundle\Entity\Departement',
                'placeholder' => $region ? 'Selectionnez votre département' : 'Selectionnez votre région',
                'mapped' => false,
                'required' => false,
                'auto_initialize' => false,
                'choices' => $region ? $region->getDepartements() : [],
                'attr' => ['class' => 'form-control']
            ]
        );
        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function(FormEvent $event)
            {
                $form = $event->getForm();
                $this->addVilleField($form->getParent(), $form->getData());
            }
        );
        $form->add($builder->getForm());
    }

    private function addVilleField(FormInterface $form, Departement $departement = null ){
        $form->add('ville', EntityType::class, [
            'class' => 'AppBundle\Entity\Ville',
            'placeholder' => $departement ? 'Séléctionnez votre ville' : 'Selectionnez votre département',
            'choices' => $departement ? $departement->getVilles() : [],
            'attr' => ['class' => 'form-control']

        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'HolluxBundle\Entity\Veterinaire'
        ]);
    }

}