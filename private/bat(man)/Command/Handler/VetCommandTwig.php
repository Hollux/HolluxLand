<?php
namespace VetBundle\Command\Handler;

use Symfony\Component\Config\Definition\Exception\Exception;

class VetCommandTwig implements VetCommandClassInterface
{
    public function addContent($content, $field, $fieldType, $lastLvl)
    {
        //categorie ou analyse
        if(isset($content->data['category']))
        {
            $name = $content->data['category'];
        } else {
            $name = '';
        }
        //Champ Key de la Base
        if ($fieldType == 'key' && $name == '') {

            $content->data['twig'] .= "
<div class=\"row\">
	<div class=\"col-md-4 col-xs-4\">
		{{ form_label(form.".strtolower($name . $field).") }}
	</div>
	<div class=\"col-md-8 col-xs-8\">
		{{ form_widget(form.".strtolower($name.$field).") }}
	</div>
</div>

";
            //Key Des Categories
        } elseif($fieldType == 'key' && $name !== ''){
            $content->data['twig'] .= "
<div class=\"row\">
    <div class=\"col-md-4 col-xs-4\">
		{{ form_label(form.".strtolower($name)."." . strtolower($name . $field) . ") }}
	</div>
	<div class=\"col-md-8 col-xs-8\">
		{{ form_widget(form.".strtolower($name)."." . strtolower($name . $field) . ") }}
	</div>
</div>
";
            // Tout les sous contenu
        } elseif($fieldType == 'methode' || $fieldType == 'typage' ||
            $fieldType == 'resultatquantitatif' || $fieldType == 'identification' ||
            $fieldType == 'typage1' || $fieldType == 'typage2' ||
            $fieldType == 'resultatquantitatif1' || $fieldType == 'resultatquantitatif2') {

            $content->data['twig'] .= "
<div class=\"row\">
    <div class=\"col-md-4 col-xs-4 col-md-offset-1 col-xs-offset-1\">
		{{ form_label(form.".strtolower($name).".".strtolower($name.$fieldType.$field).") }}
	</div>
	<div class=\"col-md-7 col-xs-7\">
		{{ form_widget(form.".strtolower($name).".".strtolower($name.$fieldType.$field).") }}
	    {% if form.".strtolower($name).".".strtolower($name.$fieldType.$field)."autre is defined  %}
	    	{{ form_widget(form.".strtolower($name).".".strtolower($name.$fieldType.$field)."autre) }}
        {% endif %}
	</div>
</div>
";
        }
    }

    public function liaison($content)
    {
        //Master liaison
        $content->data['master']->data['twig'] .= "
    <div class='enfantVet'>   
        {{ include('VetBundle:Vet:" . $content->data['category'] . ".html.twig', {'form' : form}) }}
    </div>    
        ";

        //Categorie liaison
        $content->data['twig'] .= "
<h3>" . $content->data['category'] . "</h3>
 ";

    }

    public function end($content)
    {
        if(isset($content->data['category'])) {
          //laisse identique le twig Categorie
        } else {
            $name = $content->data['analyse'];
            $content->data['twig'] = $this->startContent($name).
                                    $content->data['twig'].
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
        <div class='parentVet'>
            <div class='enfantVet'\r\n";
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