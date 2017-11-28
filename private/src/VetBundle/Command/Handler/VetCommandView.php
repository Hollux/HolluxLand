<?php
namespace VetBundle\Command\Handler;

class VetCommandView implements VetCommandClassInterface
{

    public function addContent($content, $field, $fieldType, $lastLvl)
    {
        //skip les champs à skiper
        if (isset($lastLvl['skip'])) {
            $content->data['view'] .= "
    	RAJOUTER TITRE
    ";
            return;
        }

        $category = $content->data['category'] ?? $content->data['analyse'];

        $name = strtolower($category . ($fieldType == 'key' ? '' : $fieldType) . $field);
        $label = $fieldType == 'key' ? $lastLvl[0] : $this->labelFactory($fieldType);
        $classLabel = $fieldType == 'key' ? "col-xs-4" : "col-xs-4 col-xs-offset-1";
        $classWidget = $fieldType == 'key' ? "col-xs-8" : " col-xs-7";
        echo(isset($lastLvl['label']));

        $content->data['view'] .= "
    {% if val.$name and val.$name != \"Non testé\" %}
        <div class=\"row\">
            <div class=\"$classLabel\">
                <p><strong>$label</strong></p>
            </div>
            <div class=\"$classWidget\">
                {{ val.$name }}
            </div>
        </div>
    {% endif %}";
    }

    public function liaison($content)
    {
        //Master liaison
        $content->data['master']->data['view'] .= "
            <div class='enfantVet'>   
                {{ include('VetBundle:Vet:{$content->data['category']}val.html.twig', {'val' : val.".strtolower($content->data['category'])." }) }}
            </div>";

        //Categorie liaison
        $content->data['view'] .= "
<h3>" . $content->data['category'] . "</h3>
 ";

    }

    public function end($content)
    {
        if (isset($content->data['category'])) {
            //laisse identique le view Categorie
        } else {
            $name = $content->data['analyse'];
            $content->data['view'] = $this->startContent($name) .
                $content->data['view'] .
                $this->endContent($name);
        }
    }

    public function startContent($name)
    {
        return "{% extends \"VetBundle:Base:base.html.twig\" %}

{% block titleBase %}$name{% endblock %}

{% block principal %}
$name
        <div class='parentVet'>\r\n";
    }

    public function endContent($name)
    {
        return "
            </div>
            <div class='informationsComplementaires'>
                <h3>Commentaire</h3>
                {{ val.informationcomplementaire }}
            </div>
        </div>
{% endblock %}

{% block script %}
    {{ parent() }}
{% endblock %}";

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
}