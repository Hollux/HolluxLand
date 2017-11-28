<?php
namespace VetBundle\Command\Handler;

use Symfony\Component\Config\Definition\Exception\Exception;

class VetCommandForm implements VetCommandClassInterface
{
    public function addContent($content, $field, $fieldType, $lastLvl)
    {
        //skip les champs à skiper
        if(isset($lastLvl['skip']))
        {
            return;
        }

        $category = $content->data['category'] ?? $content->data['analyse'];
        $name = strtolower($category.($fieldType == 'key' ? '' : $fieldType).$field);



        $classType = isset($lastLvl['choice']) ? 'ChoiceType::class' : 'TextType::class';
        $label = $fieldType == 'key' ? $lastLvl[0] : $this->labelFactory($fieldType);
        $class = 'form-control';
        $attr = ['class' => $class];
        //croftman passer le isset dans une variable à true en dehors pour aléger la présence du isset
        $placeholder =
            isset($lastLvl['choice']) && $fieldType != 'key' ? "'placeholder' => 'Choisir une valeur'," :
                (isset($lastLvl['choice']) && $fieldType == 'key' ? "'placeholder' => null," : '');
        //'placeholder' => null,

        $choice = !isset($lastLvl['choice']) ? '': $this->computeChoice($lastLvl['choice']).',';
        $required = '\'required\' => false,';
        $autre = '';

//apparition decendence de key
        if($fieldType == 'key')
        {
            //TODO modifier la double information pour une seule action
            $class .= ' select-more';
            $attr['class'] = $class;
            $attr['data-more'] = "".strtolower($name)."";
        } else {
            $attr['data-parent'] = "".strtolower($category.$field)."";
        }

        if(isset($lastLvl['classType']))
        {
            $classType = $this->classType($lastLvl['classType'][0]);
        }

//ajout decendence autre
        //TODO VIRER AUTRE CORRECTEMET
        if(isset($lastLvl['autre']) ||
            (isset($lastLvl['choice']) && in_array('autre', $lastLvl['choice'])))
        {
            $class .= ' select-other';
            $attr['class'] = $class;
            $attr['data-other'] = $name.'autre';

            $autre = "";
            }

            $content->data['form'] .= "
    ->add('$name', $classType, [
        'label' => '$label',
        'attr' => ".$this->arraytostring($attr).",
        $placeholder
        $choice
        $required
    ])
    $autre\r\n";

    }

    private function computeChoice($array)
    {
        $arrayChoice = "'choices' => [";
        foreach ($array as $key => $data)
            $arrayChoice .= "'" . ucfirst($data) . "' => '" . ucfirst($data) . "',";
        $arrayChoice .= ']';

        return $arrayChoice;
    }

    private function arraytostring($array)
    {
        $string = '[';
        foreach ($array as $key => $data){
            $string .= "'$key' => '$data',";
        }
        $string .= ']';

        return $string;
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

use Symfony\\Component\\Form\\Extension\\Core\\Type;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\DateType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\TextType;
use Symfony\\Component\\Form\\Extension\\Core\\Type\\IntegerType;
use Symfony\\Component\\Form\\FormBuilderInterface;
use Symfony\\Component\\OptionsResolver\\OptionsResolver;
use Symfony\\Component\\OptionsResolver\\OptionsResolverInterface;
use Symfony\\Component\\Validator\\Constraints\\Choice;
use Symfony\\Component\\Form\\Extension\\Core\\EventListener\\MergeCollectionListener;
        
class ".ucfirst($name)."Type extends AnabelAbstractType
{
    public function buildForm(FormBuilderInterface \$builder, array \$options)
    {
    
    \$builder
    \r\n";
    }

    public function endContent($name)
    {
        return ";
        
         parent::buildForm(\$builder, \$options);
    }

    public function configureOptions(OptionsResolver \$resolver)
    {
        \$resolver->setDefaults(['data_class' => '\\\\VetBundle\\\\Entity\\\\$name',]);
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
        ->add('submit', Type\\SubmitType::class, ['attr' => [\"class\" => 'btn btn-success']]);
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
            case '\Datetime':
                return 'DateType::class';
            case 'int':
                return 'IntegerType::class';
            case 'text':
                return 'textType::class';
        }

        return 'ERROR';exit;
    }



}