<?php
namespace VetBundle\Command\Handler;

use Symfony\Component\Config\Definition\Exception\Exception;

class VetCommandTwig implements VetCommandClassInterface
{
    public function addContent($content, $field, $fieldType, $lastLvl)
    {
        //skip les champs à skiper
        if (isset($lastLvl['skip'])) {
            $content->data['twig'] .= "
    	RAJOUTER TITRE
    ";
            return;
        }

        $category = $content->data['category'] ?? $content->data['analyse'];

        $name = strtolower($category . ($fieldType == 'key' ? '' : $fieldType) . $field);
        $classLabel = $fieldType == 'key' ? "col-xs-4" : "col-xs-4 col-xs-offset-1";
        $classWidget = $fieldType == 'key' ? "col-xs-8" : " col-xs-7";
        $autre = '';

//ajout decendence autre
        if (isset($lastLvl['autre']) ||
            (isset($lastLvl['choice']) && in_array('autre', $lastLvl['choice']))
        ) {

            $autre = "
                <div class=\"col-xs-6 col-xs-offset-6\">
                    {{ form_widget(form." . $name . "autre) }}
                    {{ form_errors(form." . $name . "autre) }}
                </div>";
        }

        $content->data['twig'] .= "
            <div class=\"row\">
                <div class=\"$classLabel\">
                    {{ form_label(form.$name) }}
                </div>
                <div class=\"$classWidget\">
                    {{ form_widget(form.$name) }}
                </div>
                $autre
            </div>
            {{ form_errors(form.$name) }}";
    }

    public function liaison($content)
    {
        //Master liaison
        $content->data['master']->data['twig'] .= "
            <div class='enfantVet'>   
                {{ include('VetBundle:Vet:{$content->data['category']}.html.twig', {'form' : form.".strtolower($content->data['category'])." }) }}
            </div>";

        //Categorie liaison
        $content->data['twig'] .= "
<h3>" . $content->data['category'] . "</h3>
 ";

    }

    public function end($content)
    {
        if (isset($content->data['category'])) {
            //laisse identique le twig Categorie
        } else {
            $name = $content->data['analyse'];
            $content->data['twig'] = $this->startContent($name) .
                $content->data['twig'] .
                $this->endContent($name);
        }
    }

    public function startContent($name)
    {
        return "{% extends \"VetBundle:Base:base.html.twig\" %}

{% block titleBase %}$name{% endblock %}

{% block principal %}
$name
    {{ form_start(form) }}
        <div class='parentVet'>\r\n";
    }

    public function endContent($name)
    {
        return "
            </div>
            <div class='informationsComplementaires'>
                <h3>Commentaire</h3>
                {{ form_row(form.informationcomplementaire) }}
            </div>
        </div>
   {{ form_end(form) }}
{% endblock %}

{% block script %}
    {{ parent() }}
{% endblock %}";

    }

}