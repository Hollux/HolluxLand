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
        
class BaseAvortementType extends AnabelAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
    $builder
    

    ->add('baseavortementdateavortement', DateType::class, [
        'label' => 'date avortement',
        'attr' => ['class' => 'form-control select-more','data-more' => 'baseavortementdateavortement',],
        
        
        'required' => false,
    ])
    

    ->add('baseavortementtypedeprelevement', ChoiceType::class, [
        'label' => 'type de prelevement',
        'attr' => ['class' => 'form-control select-more select-other','data-more' => 'baseavortementtypedeprelevement','data-other' => 'baseavortementtypedeprelevementautre',],
        'placeholder' => null,
        'choices' => ['Avorton' => 'Avorton','Ecouvillon' => 'Ecouvillon','Placenta' => 'Placenta','Ecouvillon + prise de sang' => 'Ecouvillon + prise de sang','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('baseavortementlesionsautopsie', TextType::class, [
        'label' => 'lésions autopsie',
        'attr' => ['class' => 'form-control select-more','data-more' => 'baseavortementlesionsautopsie',],
        
        
        'required' => false,
    ])
    
;
        
         parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => '\\VetBundle\\Entity\\BaseAvortement',]);
    }
}