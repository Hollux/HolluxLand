<?php
namespace VetBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Choice;

class AnabelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $arrayTypes = [
            ['avortement', 'Avortement', 'AVORTEMENT'],
            ["bacteriologieautresorganes", 'Bacteriologieautresorganes', "BACTERIOLOGIE : Autres organes"],
            ["bacteriologiefeces", 'Bacteriologiefeces', "BACTERIOLOGIE : Fèces"],
            ["comptagecellulaire", 'Comptagecellulaire',"COMPTAGE CELLULAIRE"],
            ["bacteriologielaitmammite", 'Bacteriologielaitmammite',"BACTERIOLOGIE : Lait de mammite"],
            ["parasitologie", 'Parasitologie',"PARASITOLOGIE"],
            ["pcr", "PCR", 'PCR'],
            ["inhibiteurslait", 'Inhibiteurslait', "INHIBITEURS DANS LE LAIT"],
            ["serologie", 'Serologie', "SEROLOGIE"],
            ["virologieautresorganes", 'Virologieautresorganes',"VIROLOGIE : Autres organes"],
            ["virologiefeces", 'Virologiefeces',"VIROLOGIE : Fèces"]
        ];
        $builder
            //ANALYSE FACTUREE A
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr'=>[
                    'class' => 'form-control']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenom',
                'attr'=>[
                    'class' => 'form-control']
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'attr'=>[
                    'class' => 'form-control']
            ])
            ->add('codepostal', IntegerType::class, [
                'label' => 'Code Postal',
                'attr'=>[
                    'class' => 'form-control']
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'attr'=>[
                    'class' => 'form-control']
            ])
            // /ANALYSE FACTUREE A

            //Caractéristiques de l'animal
            ->add('ageanimal', ChoiceType::class, [
                'placeholder' => '',
                'choices' => [
                    '<24h' => '<24h',
                    '2 à 9 jours' => '2 à 9 jours',
                    '10 jours à 3 semaines' => '10 jours à 3 semaines',
                    '3 à 4 semaines' => '3 à 4 semaines',
                    '1 à 2 mois' => '1 à 2 mois',
                    '2 à 3 mois' => '2 à 3 mois',
                    '3 à 4 mois' => '3 à 4 mois',
                    '4 à 5 mois' => '4 à 5 mois',
                    '5 à 6 mois' => '5 à 6 mois',
                    '6 mois à 1 an' => '6 mois à 1 an',
                    '1 à 2 ans' => '1 à 2 ans',
                    '>2 ans' => '>2 ans',
                    'Autre' => 'Other'
                ],
                'label' => 'Age animal',
                'attr'=>[
                    'class' => 'form-control select-autre',
                    'data-other' => 'ageanimalautre']
            ])
            ->add('ageanimalautre', TextType::class, [
                'label' => 'Nom',
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])
            ->add("lotanimaux", ChoiceType::class, [
                'choices' => [
                    'oui' => 'oui',
                    'non' => 'non'
                ],
                'label' => 'Lot d\'animaux',
                'attr'=>[
                    'class' => 'form-control select-lotanimaux']
            ])
            ->add('nanimal', IntegerType::class, [
                'label' => "N° de l'animal",
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])
            ->add('nbranimaux', IntegerType::class, [
                'label' => "Nombre d'animaux",
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])
            ->add('description', ChoiceType::class, [
                'label' => 'Description',
                'choices' => [
                    'Bovins à viande' => 'Bovins à viande',
                    'Broutards' => 'Broutards',
                    'Génisses' => 'Génisses',
                    'Veaux' => 'Veaux',
                    'Vaches' => 'Vaches',
                    'Vaches laitières' => 'Vaches laitières',
                    'Vaches taries' => 'Vaches taries',
                    'Taureaux' => 'Taureaux',
                    'Autre' => 'Other'
                ],
                'attr'=>[
                    'class' => 'form-control select-autre',
                    'data-other' => 'descriptionautre']
            ])
            ->add('descriptionautre', TextType::class, [
                'label' => 'autre',
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])


            ///Caractéristiques de l'animal

            //Informations complémentaires

            ->add('laboratoire', ChoiceType::class, [
                'label' => 'Laboratoire',
                'choices' => [
                    'Alcyon' => 'Alcyon',
                    'IDHESA 29' => 'IDHESA 29',
                    'Laboratoire interne' => 'Laboratoire interne',
                    'LDV02' => 'LDV02',
                    'LDA22' => 'LDA22',
                    'LDV35' => 'LDV35',
                    'LDV44' => 'LDV44',
                    'LDV56' => 'LDV56',
                    'Autre' => 'Other'
                ],
                'attr'=>[
                    'class' => 'form-control select-autre',
                    'data-other' => 'laboratoireautre']
            ])
            //laboratoireautre
            ->add('laboratoireautre', TextType::class, [
                'label' => 'autre',
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])

            ->add('prelevement', ChoiceType::class, [
                'label' => 'Prelevement',
                'placeholder' => '',
                'choices' => [
                    'Ecouvillon oculaire' => 'Ecouvillon oculaire',
                    'Ecouvillon utérin' => 'Ecouvillon utérin',
                    'Fèces' => 'Fèces',
                    'Fèces + prise de sang' => 'Fèces + prise de sang',
                    'Lait' => 'Lait',
                    'Lavage broncho-alvéolaire' => 'Lavage broncho-alvéolaire',
                    'LCR' => 'LCR',
                    'Placenta' => 'Placenta',
                    'Prise de sang' => 'Prise de sang',
                    'Urines' => 'Urines',
                    'Autre' => 'Other'
                ],
                'attr'=>[
                    'class' => 'form-control select-autre',
                    'data-other' => 'prelevementautre']
            ])

            //prelevementautre
            ->add('prelevementautre', TextType::class, [
                'label' => 'autre',
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])

            ->add('motifanalyse', ChoiceType::class, [
                'label' => "Motif de l'analyze",
                'placeholder' => '',
                'choices' => [
                    'Contrôle' => 'Contrôle',
                    'Diagnostic de maladie' => 'Diagnostic de maladie',
                    'Prophylaxie' => 'Prophylaxie',
                    'Autre' => 'Other'
                ],
                'attr'=>[
                    'class' => 'form-control select-autre',
                    'data-other' => 'motifanalyseautre']
            ])
            // motifanalyseautre

            ->add('motifanalyseautre', TextType::class, [
                'label' => 'autre',
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])


            ->add('dossiersuivipar', TextType::class, [
                'label' => 'Dossier suivi par',
                'attr'=>[
                    'class' => 'form-control']
            ])

            ->add('nanalyselabo', TextType::class, [
                'label' => "N° d'analyse laboratoire",
                'attr'=>[
                    'class' => 'form-control']
            ])

            ->add('dateprelevement', dateType::class, [
                'label' => 'Date de prélèvement',
                'attr'=>[
                    'class' => 'form-control']

            ])

            ->add('datereception', dateType::class, [
                'label' => 'Date de réception',
                'attr'=>[
                    'class' => 'form-control']

            ])

            ->add('dateanalyse', dateType::class, [
                'label' => "Date de d'analyse",
                'attr'=>[
                    'class' => 'form-control']

            ])

            ->add('datesaisie', dateType::class, [
                'label' => 'Date de saisie',
                'attr'=>[
                    'class' => 'form-control']

            ])

            ->add('commentaire', TextType::class, [
                'label' => 'Commentaire',
                'required' => false,
                'attr'=>[
                    'class' => 'form-control']
            ])


            // /Informations complémentaires

            // Cochez les analyses à saisir

            /*->add("analyses", ChoiceType::class, [
                'data' => $arrayTypes,
                'multiple' => true,
                'required' => false,
                'mapped' => false
            ])*/

            // /Cochez les analyses à saisir




        ->add('submit', submitType::class, [
            'attr' =>[
                'class' => 'btn btn-primary'
            ]
        ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'VetBundle\Entity\Anabel',]);
    }

    public function getName()
    {
        return 'Bundle_FormName';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        // TODO: Implement setDefaultOptions() method.
    }
}