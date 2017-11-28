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
        if(isset($lastLvl['skip']))
        {
            return;
        }

        $category = $content->data['category'] ?? $content->data['analyse'];
        $var = strtolower($lastLvl['classType'][0] ?? 'string');
        $name = strtolower($category.($fieldType == 'key' ? '' : $fieldType).$field);
        $type = $this->typeEntity($var);

        $content->data['entity'] .= "
    /**
     * @var $var
     *
     * @ORM\\Column(name=\"$name\", $type, nullable=true)
     */
    private \$$name;
    \r\n";
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
    public function typeEntity($var)
    {
        switch ($var) {
            case 'string':
                $type = 'type="string", length=255';
                break;
            case '\datetime':
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