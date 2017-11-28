<?php
namespace VetBundle\Command\Handler;

use Symfony\Component\Config\Definition\Exception\Exception;

class VetCommandEntity implements VetCommandClassInterface
{
    const allowedFieldType = array('methode', 'typage', 'resultatquantitatif', 'identification',
                    'typage1', 'typage2', 'resultatquantitatif1', 'resultatquantitatif2');
    const ignoredFieldType = ['detailFCO'];

    public function addContent($content, $field, $fieldType, $lastLvl)
    {
        //categorie ou analyse
        if(isset($content->data['category']))
        {
            $name = $content->data['category'];
        } else {
            $name = '';
        }

        //preparation
        $type = $this->typeEntity($lastLvl);

        //Champ clé
        if ($fieldType == 'key') {


            //$io->error("le champ n'est pas string, /DateTime, text, int");

            $content->data['entity'] .= "                  
    /**
     * @var " . $lastLvl[0] . "
     * @ORM\\Column(name=\"".strtolower($name.$field)."\", ".$type.", nullable=true)
     */
    private $" . strtolower($name . $field) . ";\r\n";

            //champ autre
        } elseif(in_array($fieldType, self::allowedFieldType)) {

            $content->data['entity'] .= "
    /**
     * @var string
     * @ORM\\Column(name=\"".strtolower($name.$fieldType.$field)."\", type=\"string\", length=255 , nullable=true)
     */
    private $".strtolower($name.$fieldType.$field).";\r\n";

        } elseif(in_array($fieldType, self::ignoredFieldType)) {

        }  else {

            throw new exception('fieldType non valide');
        }
    }

    public function liaison($content)
    {
        //Master liaison
        $content->data['master']->data['entity'] .= '
    /**
     * @ORM\OneToOne(targetEntity="'.ucfirst($content->data['category']).'", inversedBy="'.strtolower($content->data['master']->data['analyse']).'", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="'.strtolower($content->data['category']).'_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $'.strtolower($content->data['category']).";\r\n";

        //Categorie liaison
        $content->data['entity'] .= '
    /**
     * @ORM\OneToOne(targetEntity="'.ucfirst($content->data['master']->data['analyse']).'", mappedBy="'.strtolower($content->data['category']).'", cascade={"persist", "remove"})
     */
    private $'.strtolower($content->data['master']->data['analyse']).";\r\n";


    }

    public function end($content)
    {
        if(isset($content->data['category']))
        {
            $name = $content->data['category'];
            $content->data['entity'] = $this->startContent($name).
                                        $content->data['entity'].
                                        $this->endContent($name);
        } else {
            $name = $content->data['analyse'];
            $content->data['entity'] = $this->startContent($name).
                                        $content->data['entity'].
                                        $this->endMaster($name).
                                        $this->endContent($name);
        }
    }

    public function startContent($name)
    {
        return "<?php

namespace VetBundle\\Entity;

use Doctrine\\ORM\\Mapping as ORM;

/**
 * ".ucfirst($name)."
 * @ORM\\Table(name=\"vet_anabel_".strtolower($name)."\")
 * @ORM\\Entity(repositoryClass=\"VetBundle\\Repository\\".ucfirst($name)."Repository\")
 */
class ".ucfirst($name)."
{
    /**
     * @var int
     *
     * @ORM\\Column(name=\"id\", type=\"integer\")
     * @ORM\\Id
     * @ORM\\GeneratedValue(strategy=\"AUTO\")
     */
    private \$id;
\r\n";
    }

    public function endContent($name)
    {

        return "}";
    }

    public function endMaster($name)
    {
        return "
     /**
     * @var string
     * @ORM\\Column(name=\"informationcomplementaire\", type = \"text\", nullable = true)
     */
    private \$informationcomplementaire;\r\n";
    }

    //FONCTION UTILE EN INTERNE
    public function typeEntity($lastLvl)
    {
        $type = '';

        switch ($lastLvl[0] ?? '') {
            case 'string':
                $type = 'type="string", length=255';
                break;
            case '\DateTime':
                $type = 'type="date"';
                break;
            case 'text':
                $type = 'type="text"';
                break;
            case 'int':
                $type = 'type="integer"';
                break;
        }
        return $type;
    }


}