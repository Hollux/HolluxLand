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
        
class MycologieType extends AnabelAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
    $builder
    

    ->add('mycologiemycologie', ChoiceType::class, [
        'label' => 'mycologie',
        'attr' => ['class' => 'form-control select-more','data-more' => 'mycologiemycologie',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Absence' => 'Absence','Présence' => 'Présence',],
        'required' => false,
    ])
    

    ->add('mycologieidentificationmycologie', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'mycologiemycologie','data-other' => 'mycologieidentificationmycologieautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Aspergillus fumigatus' => 'Aspergillus fumigatus','Aspergillus sp' => 'Aspergillus sp','Candida albicans' => 'Candida albicans','Candida sp' => 'Candida sp','Cryptococcus sp' => 'Cryptococcus sp','Dermatophilus sp' => 'Dermatophilus sp','Microsporum sp' => 'Microsporum sp','Mucorales' => 'Mucorales','Trichophyton sp' => 'Trichophyton sp','Trichosporon sp' => 'Trichosporon sp','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('mycologieresultatquantitatifmycologie', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'mycologiemycologie',],
        
        
        'required' => false,
    ])
    
;
        
         parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => '\\VetBundle\\Entity\\Mycologie',]);
    }
}