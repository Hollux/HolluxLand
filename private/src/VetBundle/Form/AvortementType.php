<?php
namespace VetBundle\Form;

use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Form\Extension\Core\EventListener\MergeCollectionListener;
        
class AvortementType extends AnabelAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
    $builder
    

        ->add('baseavortement', BaseAvortementType::class)				
        
        ->add('bacteriologie', BacteriologieType::class)				
        
        ->add('pcr', PCRType::class)				
        
        ->add('mycologie', MycologieType::class)				
        
        ->add('serologie', SerologieType::class)				
        
        ->add('informationcomplementaire', TextType::class, [
            'label' => 'Information complementaire',
            'required' => false,
            'attr'=>[
                'class' => 'form-control']
                
            ])
        ->add('submit', Type\SubmitType::class, ['attr' => ["class" => 'btn btn-success']]);
        ;
        
         parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => '\\VetBundle\\Entity\\Avortement',]);
    }
}