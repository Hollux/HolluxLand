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
        
class BacteriologieType extends AnabelAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
    $builder
    

    ->add('bacteriologiebrucella', ChoiceType::class, [
        'label' => 'brucella',
        'attr' => ['class' => 'form-control select-more','data-more' => 'bacteriologiebrucella',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Absence' => 'Absence','Présence' => 'Présence',],
        'required' => false,
    ])
    

    ->add('bacteriologieidentificationbrucella', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'bacteriologiebrucella','data-other' => 'bacteriologieidentificationbrucellaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Abortus' => 'Abortus','Canis' => 'Canis','Melitensis' => 'Melitensis','Netomae' => 'Netomae','Ovis' => 'Ovis','Sp' => 'Sp','Suis' => 'Suis','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('bacteriologielisteria', ChoiceType::class, [
        'label' => 'listeria',
        'attr' => ['class' => 'form-control select-more','data-more' => 'bacteriologielisteria',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Absence' => 'Absence','Présence' => 'Présence',],
        'required' => false,
    ])
    

    ->add('bacteriologieidentificationlisteria', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'bacteriologielisteria','data-other' => 'bacteriologieidentificationlisteriaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Grayi' => 'Grayi','Innocua' => 'Innocua','Ivanovii' => 'Ivanovii','Monocytogenes' => 'Monocytogenes','Murrayi' => 'Murrayi','Sp' => 'Sp','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('bacteriologiesalmonella', ChoiceType::class, [
        'label' => 'salmonella',
        'attr' => ['class' => 'form-control select-more','data-more' => 'bacteriologiesalmonella',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Absence' => 'Absence','Présence' => 'Présence',],
        'required' => false,
    ])
    

    ->add('bacteriologieidentificationsalmonella', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'bacteriologiesalmonella','data-other' => 'bacteriologieidentificationsalmonellaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Bredeney' => 'Bredeney','Choleraesuis' => 'Choleraesuis','Derby' => 'Derby','Dublin' => 'Dublin','Entericia' => 'Entericia','Enteritidis' => 'Enteritidis','Infantis' => 'Infantis','Montevideo' => 'Montevideo','Newport' => 'Newport','Panama' => 'Panama','Paratyphi' => 'Paratyphi','Senftenberg' => 'Senftenberg','Sp' => 'Sp','Typhimurium' => 'Typhimurium',' virchow' => ' virchow','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('bacteriologieautrebacteriologie', TextType::class, [
        'label' => 'autre',
        'attr' => ['class' => 'form-control select-more','data-more' => 'bacteriologieautrebacteriologie',],
        
        
        'required' => false,
    ])
    
;
        
         parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => '\\VetBundle\\Entity\\Bacteriologie',]);
    }
}