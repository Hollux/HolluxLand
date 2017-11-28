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
        
class PCRType extends AnabelAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
    $builder
    

    ->add('pcrbrucella', ChoiceType::class, [
        'label' => 'brucella',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrbrucella',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodebrucella', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrbrucella','data-other' => 'pcrmethodebrucellaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcridentificationbrucella', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrbrucella','data-other' => 'pcridentificationbrucellaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Abortus' => 'Abortus','Canis' => 'Canis','Melitensis' => 'Melitensis','Netomae' => 'Netomae','Ovis' => 'Ovis','Suis' => 'Suis','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifbrucella', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcrbrucella',],
        
        
        'required' => false,
    ])
    

    ->add('pcrbvd', ChoiceType::class, [
        'label' => 'BVD',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrbvd',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodebvd', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrbvd','data-other' => 'pcrmethodebvdautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifbvd', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcrbvd',],
        
        
        'required' => false,
    ])
    

    ->add('pcrchlamydia', ChoiceType::class, [
        'label' => 'chlamydia',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrchlamydia',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodechlamydia', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrchlamydia','data-other' => 'pcrmethodechlamydiaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcridentificationchlamydia', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrchlamydia','data-other' => 'pcridentificationchlamydiaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Agalactiae' => 'Agalactiae','Bovis' => 'Bovis','Dispar' => 'Dispar','Muridarum' => 'Muridarum','Suis' => 'Suis','Sp' => 'Sp','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifchlamydia', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcrchlamydia',],
        
        
        'required' => false,
    ])
    

    ->add('pcrcoxiellaburnetii', ChoiceType::class, [
        'label' => 'coxiella burnetii (Fièvre Q)',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrcoxiellaburnetii',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodecoxiellaburnetii', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrcoxiellaburnetii','data-other' => 'pcrmethodecoxiellaburnetiiautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifcoxiellaburnetii', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcrcoxiellaburnetii',],
        
        
        'required' => false,
    ])
    

    ->add('pcribr', ChoiceType::class, [
        'label' => 'IBR',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcribr',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodeibr', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcribr','data-other' => 'pcrmethodeibrautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifibr', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcribr',],
        
        
        'required' => false,
    ])
    

    ->add('pcrleptospira', ChoiceType::class, [
        'label' => 'leptospira',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrleptospira',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodeleptospira', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrleptospira','data-other' => 'pcrmethodeleptospiraautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcridentificationleptospira', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrleptospira','data-other' => 'pcridentificationleptospiraautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Australis' => 'Australis','Autumnalis' => 'Autumnalis','Ballum' => 'Ballum','Bataviae' => 'Bataviae','Grippotyphosa' => 'Grippotyphosa','Hardjobovis' => 'Hardjobovis','Hebdomadis' => 'Hebdomadis','Icterohaemorrhagiae' => 'Icterohaemorrhagiae','Panama' => 'Panama','Pomona' => 'Pomona','Pyrogenes' => 'Pyrogenes','Tarassovi' => 'Tarassovi','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifleptospira', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcrleptospira',],
        
        
        'required' => false,
    ])
    

    ->add('pcrleucose', ChoiceType::class, [
        'label' => 'leucose',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrleucose',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodeleucose', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrleucose','data-other' => 'pcrmethodeleucoseautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifleucose', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcrleucose',],
        
        
        'required' => false,
    ])
    

    ->add('pcrneospora', ChoiceType::class, [
        'label' => 'neospora',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrneospora',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('pcrmethodeneospora', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'pcrneospora','data-other' => 'pcrmethodeneosporaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('pcrresultatquantitatifneospora', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'pcrneospora',],
        
        
        'required' => false,
    ])
    

    ->add('pcrautrepcr', TextType::class, [
        'label' => 'autre',
        'attr' => ['class' => 'form-control select-more','data-more' => 'pcrautrepcr',],
        
        
        'required' => false,
    ])
    
;
        
         parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => '\\VetBundle\\Entity\\PCR',]);
    }
}