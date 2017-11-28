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
        
class SerologieType extends AnabelAbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    
    $builder
    

    ->add('serologieadenovirus', ChoiceType::class, [
        'label' => 'adénovirus',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieadenovirus',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodeadenovirus', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieadenovirus','data-other' => 'serologiemethodeadenovirusautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologietypageadenovirus', ChoiceType::class, [
        'label' => 'typage',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieadenovirus','data-other' => 'serologietypageadenovirusautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Sérotype1' => 'Sérotype1','Sérotype2' => 'Sérotype2','Sérotype3' => 'Sérotype3','Sérotype4' => 'Sérotype4','Sérotype5' => 'Sérotype5','Sérotype6' => 'Sérotype6','Sérotype7' => 'Sérotype7','Sérotype8' => 'Sérotype8','Sérotype9' => 'Sérotype9','Sous-groupe I' => 'Sous-groupe I','Sous-groupe II' => 'Sous-groupe II','Non-typé' => 'Non-typé','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifadenovirus', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologieadenovirus',],
        
        
        'required' => false,
    ])
    

    ->add('serologieanaplasma', ChoiceType::class, [
        'label' => 'anaplasma',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieanaplasma',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodeanaplasma', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieanaplasma','data-other' => 'serologiemethodeanaplasmaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieidentificationanaplasma', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieanaplasma','data-other' => 'serologieidentificationanaplasmaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Bovis' => 'Bovis','Phagocytophila' => 'Phagocytophila','Sp' => 'Sp','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifanaplasma', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologieanaplasma',],
        
        
        'required' => false,
    ])
    

    ->add('serologiebesnoitiabesnoiti', ChoiceType::class, [
        'label' => 'besnoitia besnoiti',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiebesnoitiabesnoiti',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodebesnoitiabesnoiti', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiebesnoitiabesnoiti','data-other' => 'serologiemethodebesnoitiabesnoitiautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifbesnoitiabesnoiti', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiebesnoitiabesnoiti',],
        
        
        'required' => false,
    ])
    

    ->add('serologiebrucella', ChoiceType::class, [
        'label' => 'brucella',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiebrucella',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodebrucella', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiebrucella','data-other' => 'serologiemethodebrucellaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieidentificationbrucella', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiebrucella','data-other' => 'serologieidentificationbrucellaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Abortus' => 'Abortus','Canis' => 'Canis','Melitensis' => 'Melitensis','Netomae' => 'Netomae','Ovis' => 'Ovis','Suis' => 'Suis','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifbrucella', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiebrucella',],
        
        
        'required' => false,
    ])
    

    ->add('serologiebvd', ChoiceType::class, [
        'label' => 'BVD',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiebvd',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodebvd', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiebvd','data-other' => 'serologiemethodebvdautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifbvd', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiebvd',],
        
        
        'required' => false,
    ])
    

    ->add('serologiechlamydia', ChoiceType::class, [
        'label' => 'chlamydia',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiechlamydia',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodechlamydia', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiechlamydia','data-other' => 'serologiemethodechlamydiaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieidentificationchlamydia', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiechlamydia','data-other' => 'serologieidentificationchlamydiaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Agalactiae' => 'Agalactiae','Bovis' => 'Bovis','Dispar' => 'Dispar','Muridarum' => 'Muridarum','Suis' => 'Suis','Sp' => 'Sp','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifchlamydia', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiechlamydia',],
        
        
        'required' => false,
    ])
    

    ->add('serologiechlamydophila', ChoiceType::class, [
        'label' => 'chlamydophila',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiechlamydophila',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodechlamydophila', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiechlamydophila','data-other' => 'serologiemethodechlamydophilaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieidentificationchlamydophila', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiechlamydophila','data-other' => 'serologieidentificationchlamydophilaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Pecorum' => 'Pecorum','Pneumoniae' => 'Pneumoniae','Psittaci' => 'Psittaci','Sp' => 'Sp','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifchlamydophila', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiechlamydophila',],
        
        
        'required' => false,
    ])
    

    ->add('serologiecoxiellaburnetii', ChoiceType::class, [
        'label' => 'coxiella burnetii (Fièvre Q)',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiecoxiellaburnetii',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodecoxiellaburnetii', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiecoxiellaburnetii','data-other' => 'serologiemethodecoxiellaburnetiiautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifcoxiellaburnetii', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiecoxiellaburnetii',],
        
        
        'required' => false,
    ])
    

    ->add('serologieerlichia', ChoiceType::class, [
        'label' => 'erlichia',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieerlichia',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodeerlichia', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieerlichia','data-other' => 'serologiemethodeerlichiaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatiferlichia', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologieerlichia',],
        
        
        'required' => false,
    ])
    

    ->add('serologiefco', ChoiceType::class, [
        'label' => 'FCO',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiefco',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodefco', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiefco','data-other' => 'serologiemethodefcoautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologietypage1fco', ChoiceType::class, [
        'label' => 'typage n°1',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiefco','data-other' => 'serologietypage1fcoautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Sérotype 1' => 'Sérotype 1','Sérotype 2' => 'Sérotype 2','Sérotype 3' => 'Sérotype 3','Sérotype 4' => 'Sérotype 4','Sérotype 5' => 'Sérotype 5','Sérotype 6' => 'Sérotype 6','Sérotype 7' => 'Sérotype 7','Sérotype 8' => 'Sérotype 8','Sérotype 9' => 'Sérotype 9','Sérotype 10' => 'Sérotype 10','Sérotype 11' => 'Sérotype 11','Sérotype 12' => 'Sérotype 12','Sérotype 13' => 'Sérotype 13','Sérotype 14' => 'Sérotype 14','Sérotype 15' => 'Sérotype 15','Sérotype 16' => 'Sérotype 16','Sérotype 17' => 'Sérotype 17','Sérotype 18' => 'Sérotype 18','Sérotype 19' => 'Sérotype 19','Sérotype 20' => 'Sérotype 20','Sérotype 21' => 'Sérotype 21','Sérotype 22' => 'Sérotype 22','Sérotype 23' => 'Sérotype 23','Sérotype 24' => 'Sérotype 24','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatif1fco', TextType::class, [
        'label' => 'resultat quantitatif n°1',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiefco',],
        
        
        'required' => false,
    ])
    

    ->add('serologietypage2fco', ChoiceType::class, [
        'label' => 'typage n°2',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiefco','data-other' => 'serologietypage2fcoautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Sérotype 1' => 'Sérotype 1','Sérotype 2' => 'Sérotype 2','Sérotype 3' => 'Sérotype 3','Sérotype 4' => 'Sérotype 4','Sérotype 5' => 'Sérotype 5','Sérotype 6' => 'Sérotype 6','Sérotype 7' => 'Sérotype 7','Sérotype 8' => 'Sérotype 8','Sérotype 9' => 'Sérotype 9','Sérotype 10' => 'Sérotype 10','Sérotype 11' => 'Sérotype 11','Sérotype 12' => 'Sérotype 12','Sérotype 13' => 'Sérotype 13','Sérotype 14' => 'Sérotype 14','Sérotype 15' => 'Sérotype 15','Sérotype 16' => 'Sérotype 16','Sérotype 17' => 'Sérotype 17','Sérotype 18' => 'Sérotype 18','Sérotype 19' => 'Sérotype 19','Sérotype 20' => 'Sérotype 20','Sérotype 21' => 'Sérotype 21','Sérotype 22' => 'Sérotype 22','Sérotype 23' => 'Sérotype 23','Sérotype 24' => 'Sérotype 24','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatif2fco', TextType::class, [
        'label' => 'resultat quantitatif n°2',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiefco',],
        
        
        'required' => false,
    ])
    

    ->add('serologieibr', ChoiceType::class, [
        'label' => 'IBR',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieibr',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodeibr', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieibr','data-other' => 'serologiemethodeibrautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifibr', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologieibr',],
        
        
        'required' => false,
    ])
    

    ->add('serologieleptospira', ChoiceType::class, [
        'label' => 'leptospira',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieleptospira',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodeleptospira', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieleptospira','data-other' => 'serologiemethodeleptospiraautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieidentificationleptospira', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieleptospira','data-other' => 'serologieidentificationleptospiraautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Australis' => 'Australis','Autumnalis' => 'Autumnalis','Ballum' => 'Ballum','Bataviae' => 'Bataviae','Grippotyphosa' => 'Grippotyphosa','Hardjobovis' => 'Hardjobovis','Hebdomadis' => 'Hebdomadis','Icterohaemorrhagiae' => 'Icterohaemorrhagiae','Panama' => 'Panama','Pomona' => 'Pomona','Pyrogenes' => 'Pyrogenes','Sp' => 'Sp','Tarassovi' => 'Tarassovi','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifleptospira', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologieleptospira',],
        
        
        'required' => false,
    ])
    

    ->add('serologiemycoplasma', ChoiceType::class, [
        'label' => 'mycoplasma',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiemycoplasma',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodemycoplasma', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiemycoplasma','data-other' => 'serologiemethodemycoplasmaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieidentificationmycoplasma', ChoiceType::class, [
        'label' => 'identification',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiemycoplasma','data-other' => 'serologieidentificationmycoplasmaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Agalactiae' => 'Agalactiae','Bovis' => 'Bovis','Dispar' => 'Dispar','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifmycoplasma', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiemycoplasma',],
        
        
        'required' => false,
    ])
    

    ->add('serologieneospora', ChoiceType::class, [
        'label' => 'neospora',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieneospora',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodeneospora', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieneospora','data-other' => 'serologiemethodeneosporaautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifneospora', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologieneospora',],
        
        
        'required' => false,
    ])
    

    ->add('serologieparainfluenzapi3', ChoiceType::class, [
        'label' => 'parainfluenza PI3',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieparainfluenzapi3',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodeparainfluenzapi3', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologieparainfluenzapi3','data-other' => 'serologiemethodeparainfluenzapi3autre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifparainfluenzapi3', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologieparainfluenzapi3',],
        
        
        'required' => false,
    ])
    

    ->add('serologiersv', ChoiceType::class, [
        'label' => 'RSV',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologiersv',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodersv', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologiersv','data-other' => 'serologiemethodersvautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifrsv', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologiersv',],
        
        
        'required' => false,
    ])
    

    ->add('serologievisnamaedi', ChoiceType::class, [
        'label' => 'Visna maëdi',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologievisnamaedi',],
        'placeholder' => null,
        'choices' => ['Non testé' => 'Non testé','Négatif' => 'Négatif','Positif' => 'Positif','Positif+' => 'Positif+','Positif++' => 'Positif++','Positif+++' => 'Positif+++','Positif++++' => 'Positif++++','Douteux' => 'Douteux',],
        'required' => false,
    ])
    

    ->add('serologiemethodevisnamaedi', ChoiceType::class, [
        'label' => 'méthode',
        'attr' => ['class' => 'form-control select-other','data-parent' => 'serologievisnamaedi','data-other' => 'serologiemethodevisnamaediautre',],
        'placeholder' => 'Choisir une valeur',
        'choices' => ['Qualitative' => 'Qualitative','Quantitative' => 'Quantitative','Temps réel' => 'Temps réel','Autre' => 'Autre',],
        'required' => false,
    ])
    

    ->add('serologieresultatquantitatifvisnamaedi', TextType::class, [
        'label' => 'resultat quantitatif',
        'attr' => ['class' => 'form-control','data-parent' => 'serologievisnamaedi',],
        
        
        'required' => false,
    ])
    

    ->add('serologieautrepcr', TextType::class, [
        'label' => 'autre',
        'attr' => ['class' => 'form-control select-more','data-more' => 'serologieautrepcr',],
        
        
        'required' => false,
    ])
    
;
        
         parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => '\\VetBundle\\Entity\\Serologie',]);
    }
}