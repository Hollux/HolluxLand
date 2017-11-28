<?php
namespace VetBundle\Command\Handler;

use Symfony\Component\Config\Definition\Exception\Exception;

class VetCommandForm implements VetCommandClassInterface
{
    public function addContent($content, $field, $fieldType, $lastLvl)
    {
        // Categorie ou analyse
        $category = $content->data['category'] ?? '';

        // Default value
        $name = $category.($fieldType == 'key' ? '' : $fieldType).$field;
        $classType = 'ChoiceType::class';
        $label = $this->labelFactory($fieldType);
        $attr = [];
        $arrayChoice = '';
        $needOther = false;

        //ADD pour les champs KEY
        if ($fieldType == 'key') {

            $classType = isset($lastLvl[2]) ? $classType : $this->classType($lastLvl[0]);
            $label = $lastLvl[1];

            //Remplir l'array Choice et attr
            if(isset($lastLvl[2])) {
                $arrayChoice = $this->computeChoice($lastLvl[2]);

                $attr = ['class' => 'form-control select-more', 'data-more' => $name];
            }

        } else {
            switch ($fieldType) {
                case 'resultatquantitatif':
                case 'resultatquantitatif1' :
                case 'resultatquantitatif2' :   //Configuration pour les champs RESULTATQUANTITATIF
                {
                    $classType = 'TextType::class';
                    $attr = [ 'data-parent' => $category.$field];
                    break;
                }
                case 'methode':
                case 'identification':
                case 'typage':
                case 'typage1':
                case 'typage2':     //Configuration pour les champs METHODE TYPAGE IDENTIFICATION
                {
                    // Compute Choice
                    $arrayChoice = $this->computeChoice($lastLvl[0]);

                    // Compute attributs
                    $attr = [   'class' => 'form-control  select-autre',
                                'data-parent' => $category.$field,
                                'data-autre' => $category.$field.'autre'];

                    // NeedOther Field
                    $needOther = true;

                    break;
                }
                case 'detailFCO':
                {

                }
                default: {
                    throw new \Exception($fieldType);
                }
            }
        }

        // Add field to form
        $this->add($content,
            $name,
            $classType,
            $label,
            $attr,
            $arrayChoice);

        // need other field
        if($needOther) {
            $this->add($content,
                $category . $fieldType . $field . 'autre',
                'TextType::class',
                'autre',
                ['data-parent' => $category . $field . 'autre'],
                null,
                'false',
                'false');
        }
    }

    private function computeChoice($array)
    {
        $arrayChoice = '[';
        foreach ($array as $val)
            $arrayChoice .= "'" . ucfirst($val) . "' => '" . ucfirst($val) . "',";
        $arrayChoice .= ']';

        return $arrayChoice;
    }

    private function add($content, $name, $type, $label, $attr = [], $choicesArray = '', $required = 'true', $mapped='true')
    {
        $name = strtolower($name);
        $placeholder = '';

        // Choice array and not required
        if($choicesArray && !$required)
            $placeholder ="'placeholder' => 'Choisir une valeur',";

        // Choice array
        if($choicesArray)
            $choicesArray ="'choices' => $choicesArray,";

        //  required
        $required ="'required' => $required,";

        // Mapped
        $mapped ="'mapped' => $mapped,";


        // Add attributs
        $attr['class'] = $attr["class"] ?? 'form-control'; // Default 'class' => 'form-control'
        $attributs ='';
        foreach ($attr as $key=> $data) {
            $attributs .="
                            '$key' => '$data',";
        }

        //  add to content
        $content->data['form'] .= "
         ->add('$name', 
            $type, 
            [
                'label' => '$label',
                $mapped 
                $required 
                $choicesArray 
                $placeholder
                'attr' => [$attributs]
            ]
         )";
    }

    public function liaison($content)
    {
        //Ajout de l'appel du nouveau Type dans Master
        $content->data['master']->data['form'] .= "
        ->add('".strtolower($content->data['category'])."', ".ucfirst($content->data['category'])."Type::class)				
        ";
    }

    public function end($content)
    {
        if(isset($content->data['category']))
        {
            $name = $content->data['category'];
            $content->data['form'] = $this->startContent($name).
                                $content->data['form'].
                                $this->endContent($name);
        } else {
            $name = $content->data['analyse'];
            $content->data['form'] = $this->startContent($name).
                                    $content->data['form'].
                                    $this->endMaster($name).
                                    $this->endContent($name);
        }

    }

    public function startContent($name)
    {
        return "<?php
namespace VetBundle\\Form;

use Symfony\\Component\\Form\\AbstractType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\CheckboxType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\CollectionType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\DateType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\TextType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\IntegerType;
use Symfony\\Component\\Form\\FormBuilderInterface;
use Symfony\\Component\\Form\\Extension\\Core\\Type;
use Symfony\\Component\\OptionsResolver\\OptionsResolver;
use Symfony\\Component\\OptionsResolver\\OptionsResolverInterface;
use Symfony\\Component\\Validator\\Constraints\\Choice;
        
class ".ucfirst($name)."Type extends AbstractType
{
    public function buildForm(FormBuilderInterface \$builder, array \$options)
    {
    
    \$builder
    \r\n";
    }

    public function endContent($name)
    {
        return ";
    }

    public function configureOptions(OptionsResolver \$resolver)
    {
        \$resolver->setDefaults(['data_class' => 'VetBundle\\Entity\\$name',]);
    }
}";
    }

    public function endMaster($name)
    {
        //TODO RECUPERER INFO POUR UN TINYMCE
        return "
        ->add('informationcomplementaire', TextType::class, [
            'label' => 'Information complementaire',
            'required' => false,
            'attr'=>[
                'class' => 'form-control']
                
            ])
        ";

    }

    //UTILITAIRE
    public function labelFactory($name)
    {
        switch ($name) {
            case 'methode':
                return 'méthode';
            case 'resultatquantitatif1':
                return 'resultat quantitatif n°1';
            case 'typage1':
                return 'typage n°1';
            case 'resultatquantitatif2':
                return 'resultat quantitatif n°2';
            case 'typage2':
                return 'typage n°2';
            case 'resultatquantitatif':
                return 'resultat quantitatif';
            case 'identification':
                return 'identification';
            case 'typage':
                return 'typage';
        }

        return '';
    }

    public function classType($type)
    {
        switch ($type) {
            case 'string':
                return 'TextType::class';
            case '\DateTime':
                return 'DateType::class';
            case 'int':
                return 'IntegerType::class';
            case 'text':
                return 'textType::class';
        }

        return 'ChoiceType::class';
    }



}