<?php

namespace ListBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Figurine
 *
 * @ORM\Table(name="listbuilder_figurine")
 * @ORM\Entity(repositoryClass="ListBuilderBundle\Repository\FigurineRepository")
 */
class Figurine
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(name="maxnumber", type="integer")
     */
    private $maxnumber;

    /**
     * @var int
     *
     * @ORM\Column(name="m", type="integer")
     */
    private $m;

    /**
     * @var int
     *
     * @ORM\Column(name="cc", type="integer")
     */
    private $cc;

    /**
     * @var int
     *
     * @ORM\Column(name="ct", type="integer")
     */
    private $ct;

    /**
     * @var int
     *
     * @ORM\Column(name="f", type="integer")
     */
    private $f;

    /**
     * @var int
     *
     * @ORM\Column(name="e", type="integer")
     */
    private $e;

    /**
     * @var int
     *
     * @ORM\Column(name="pv", type="integer")
     */
    private $pv;

    /**
     * @var int
     *
     * @ORM\Column(name="i", type="integer")
     */
    private $i;

    /**
     * @var int
     *
     * @ORM\Column(name="a", type="integer")
     */
    private $a;

    /**
     * @var int
     *
     * @ORM\Column(name="cd", type="integer")
     */
    private $cd;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="cost", type="integer")
     */
    private $cost;

    /**
     * @ORM\ManyToOne(targetEntity="Faction", inversedBy="figurines", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $listbuilderfaction;

    /**
     * @ORM\OneToMany(targetEntity="List_Figurine", mappedBy="figurine", cascade={"persist", "remove"})
     */
    private $list_figurines;

    /**
     * @ORM\ManyToMany(targetEntity="Option", mappedBy="figurines")
     */
    private $figurineoptions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->list_figurines = new \Doctrine\Common\Collections\ArrayCollection();
        $this->figurineoptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Figurine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Figurine
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set maxnumber
     *
     * @param integer $maxnumber
     *
     * @return Figurine
     */
    public function setMaxnumber($maxnumber)
    {
        $this->maxnumber = $maxnumber;

        return $this;
    }

    /**
     * Get maxnumber
     *
     * @return integer
     */
    public function getMaxnumber()
    {
        return $this->maxnumber;
    }

    /**
     * Set cc
     *
     * @param integer $cc
     *
     * @return Figurine
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Get cc
     *
     * @return integer
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Set ct
     *
     * @param integer $ct
     *
     * @return Figurine
     */
    public function setCt($ct)
    {
        $this->ct = $ct;

        return $this;
    }

    /**
     * Get ct
     *
     * @return integer
     */
    public function getCt()
    {
        return $this->ct;
    }

    /**
     * Set f
     *
     * @param integer $f
     *
     * @return Figurine
     */
    public function setF($f)
    {
        $this->f = $f;

        return $this;
    }

    /**
     * Get f
     *
     * @return integer
     */
    public function getF()
    {
        return $this->f;
    }

    /**
     * Set e
     *
     * @param integer $e
     *
     * @return Figurine
     */
    public function setE($e)
    {
        $this->e = $e;

        return $this;
    }

    /**
     * Get e
     *
     * @return integer
     */
    public function getE()
    {
        return $this->e;
    }

    /**
     * Set pv
     *
     * @param integer $pv
     *
     * @return Figurine
     */
    public function setPv($pv)
    {
        $this->pv = $pv;

        return $this;
    }

    /**
     * Get pv
     *
     * @return integer
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Set cd
     *
     * @param integer $cd
     *
     * @return Figurine
     */
    public function setCd($cd)
    {
        $this->cd = $cd;

        return $this;
    }

    /**
     * Get cd
     *
     * @return integer
     */
    public function getCd()
    {
        return $this->cd;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Figurine
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     *
     * @return Figurine
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set listbuilderfaction
     *
     * @param \ListBuilderBundle\Entity\Faction $listbuilderfaction
     *
     * @return Figurine
     */
    public function setListbuilderfaction(\ListBuilderBundle\Entity\Faction $listbuilderfaction = null)
    {
        $this->listbuilderfaction = $listbuilderfaction;

        return $this;
    }

    /**
     * Get listbuilderfaction
     *
     * @return \ListBuilderBundle\Entity\Faction
     */
    public function getListbuilderfaction()
    {
        return $this->listbuilderfaction;
    }

    /**
     * Add listFigurine
     *
     * @param \ListBuilderBundle\Entity\List_Figurine $listFigurine
     *
     * @return Figurine
     */
    public function addListFigurine(\ListBuilderBundle\Entity\List_Figurine $listFigurine)
    {
        $this->list_figurines[] = $listFigurine;

        return $this;
    }

    /**
     * Remove listFigurine
     *
     * @param \ListBuilderBundle\Entity\List_Figurine $listFigurine
     */
    public function removeListFigurine(\ListBuilderBundle\Entity\List_Figurine $listFigurine)
    {
        $this->list_figurines->removeElement($listFigurine);
    }

    /**
     * Get listFigurines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getListFigurines()
    {
        return $this->list_figurines;
    }

    /**
     * Add figurineoption
     *
     * @param \ListBuilderBundle\Entity\Option $figurineoption
     *
     * @return Figurine
     */
    public function addFigurineoption(\ListBuilderBundle\Entity\Option $figurineoption)
    {
        $this->figurineoptions[] = $figurineoption;

        return $this;
    }

    /**
     * Remove figurineoption
     *
     * @param \ListBuilderBundle\Entity\Option $figurineoption
     */
    public function removeFigurineoption(\ListBuilderBundle\Entity\Option $figurineoption)
    {
        $this->figurineoptions->removeElement($figurineoption);
    }

    /**
     * Get figurineoption
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFigurineoptions()
    {
        return $this->figurineoptions;
    }

    /**
     * Set m
     *
     * @param integer $m
     *
     * @return Figurine
     */
    public function setM($m)
    {
        $this->m = $m;

        return $this;
    }

    /**
     * Get m
     *
     * @return integer
     */
    public function getM()
    {
        return $this->m;
    }

    /**
     * Set i
     *
     * @param integer $i
     *
     * @return Figurine
     */
    public function setI($i)
    {
        $this->i = $i;

        return $this;
    }

    /**
     * Get i
     *
     * @return integer
     */
    public function getI()
    {
        return $this->i;
    }

    /**
     * Set a
     *
     * @param integer $a
     *
     * @return Figurine
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return integer
     */
    public function getA()
    {
        return $this->a;
    }
}
