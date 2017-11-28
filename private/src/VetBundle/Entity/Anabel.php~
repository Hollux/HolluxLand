<?php

namespace VetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anabel
 *
 * @ORM\Table(name="vet_anabel")
 * @ORM\Entity(repositoryClass="VetBundle\Repository\AnabelRepository")
 */
class Anabel
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="codepostal", type="integer", nullable=true)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="ageanimal", type="string", length=255, nullable=true)
     */
    private $ageanimal;

    /**
     * @var string
     *
     * @ORM\Column(name="ageanimalautre", type="string", length=255, nullable=true)
     */
    private $ageanimalautre;


    /**
     * @var string
     *
     * @ORM\Column(name="lotanimaux", type="string", length=255, nullable=true)
     */
    private $lotanimaux;

    /**
     * @var int
     *
     * @ORM\Column(name="nbranimaux", type="integer", nullable=true)
     */
    private $nbranimaux;

    /**
     * @var int
     *
     * @ORM\Column(name="nanimal", type="integer", nullable=true)
     */
    private $nanimal;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionautre", type="string", length=255, nullable=true)
     */
    private $descriptionautre;

    /**
     * @var string
     *
     * @ORM\Column(name="laboratoire", type="string", length=255, nullable=true)
     */
    private $laboratoire;

    /**
     * @var string
     *
     * @ORM\Column(name="laboratoireautre", type="string", length=255, nullable=true)
     */
    private $laboratoireautre;

    /**
     * @var string
     *
     * @ORM\Column(name="prelevement", type="string", length=255, nullable=true)
     */
    private $prelevement;

    /**
     * @var string
     *
     * @ORM\Column(name="prelevementautre", type="string", length=255, nullable=true)
     */
    private $prelevementautre;

    /**
     * @var string
     *
     * @ORM\Column(name="motifanalyse", type="string", length=255, nullable=true)
     */
    private $motifanalyse;

    /**
     * @var string
     *
     * @ORM\Column(name="motifanalyseautre", type="string", length=255, nullable=true)
     */
    private $motifanalyseautre;


    /**
     * @var string
     *
     * @ORM\Column(name="dossiersuivipar", type="string", length=255, nullable=true)
     */
    private $dossiersuivipar;

    /**
     * @var int
     *
     * @ORM\Column(name="nanalyselabo", type="integer", nullable=true)
     */
    private $nanalyselabo;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateprelevement", type="date", nullable=true)
     */
    private $dateprelevement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datereception", type="date", nullable=true)
     */
    private $datereception;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateanalyse", type="date", nullable=true)
     */
    private $dateanalyse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datesaisie", type="date", nullable=true)
     */
    private $datesaisie;

    /**
     * @ORM\OneToOne(targetEntity="Avortement", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="avortement_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    /*private $avortement;*/

    /**
     * @ORM\OneToOne(targetEntity="BacteriologieAutresOrganes", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="bacteriologieautresorganes_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $bacteriologieautresorganes;

    /**
     * @ORM\OneToOne(targetEntity="BacteriologieFeces", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="bacteriologiefeces_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $bacteriologiefeces;

    /**
     * @ORM\OneToOne(targetEntity="BacteriologieLaitMammite", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="bacteriologielaitmammite_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $bacteriologielaitmammite;

    /**
     * @ORM\OneToOne(targetEntity="ComptageCellulaire", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="comptagecellulaire_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $comptagecellulaire;

    /**
     * @ORM\OneToOne(targetEntity="InhibiteursLait", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="inhibiteurslait_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $inhibiteurslait;

    /**
     * @ORM\OneToOne(targetEntity="Parasitologie", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="parasitologie_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $parasitologie;

    /**
     * @ORM\OneToOne(targetEntity="PCR", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="pcr_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $pcr;

    /**
     * @ORM\OneToOne(targetEntity="Serologie", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="serologie_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $serologie;

    /**
     * @ORM\OneToOne(targetEntity="VirologieAutresOrganes", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="virologieautresorganes_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $virologieautresorganes;

    /**
     * @ORM\OneToOne(targetEntity="VirologieFeces", inversedBy="anabel", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="virologiefeces_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $virologiefeces;




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Anabel
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Anabel
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Anabel
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return Anabel
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return integer
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Anabel
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set lotanimaux
     *
     * @param string $lotanimaux
     *
     * @return Anabel
     */
    public function setLotanimaux($lotanimaux)
    {
        $this->lotanimaux = $lotanimaux;

        return $this;
    }

    /**
     * Get lotanimaux
     *
     * @return string
     */
    public function getLotanimaux()
    {
        return $this->lotanimaux;
    }

    /**
     * Set nbranimaux
     *
     * @param integer $nbranimaux
     *
     * @return Anabel
     */
    public function setNbranimaux($nbranimaux)
    {
        $this->nbranimaux = $nbranimaux;

        return $this;
    }

    /**
     * Get nbranimaux
     *
     * @return integer
     */
    public function getNbranimaux()
    {
        return $this->nbranimaux;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Anabel
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set laboratoire
     *
     * @param string $laboratoire
     *
     * @return Anabel
     */
    public function setLaboratoire($laboratoire)
    {
        $this->laboratoire = $laboratoire;

        return $this;
    }

    /**
     * Get laboratoire
     *
     * @return string
     */
    public function getLaboratoire()
    {
        return $this->laboratoire;
    }

    /**
     * Set prelevement
     *
     * @param string $prelevement
     *
     * @return Anabel
     */
    public function setPrelevement($prelevement)
    {
        $this->prelevement = $prelevement;

        return $this;
    }

    /**
     * Get prelevement
     *
     * @return string
     */
    public function getPrelevement()
    {
        return $this->prelevement;
    }

    /**
     * Set motifanalyse
     *
     * @param string $motifanalyse
     *
     * @return Anabel
     */
    public function setMotifanalyse($motifanalyse)
    {
        $this->motifanalyse = $motifanalyse;

        return $this;
    }

    /**
     * Get motifanalyse
     *
     * @return string
     */
    public function getMotifanalyse()
    {
        return $this->motifanalyse;
    }

    /**
     * Set dossiersuivipar
     *
     * @param string $dossiersuivipar
     *
     * @return Anabel
     */
    public function setDossiersuivipar($dossiersuivipar)
    {
        $this->dossiersuivipar = $dossiersuivipar;

        return $this;
    }

    /**
     * Get dossiersuivipar
     *
     * @return string
     */
    public function getDossiersuivipar()
    {
        return $this->dossiersuivipar;
    }

    /**
     * Set nanalyselabo
     *
     * @param integer $nanalyselabo
     *
     * @return Anabel
     */
    public function setNanalyselabo($nanalyselabo)
    {
        $this->nanalyselabo = $nanalyselabo;

        return $this;
    }

    /**
     * Get nanalyselabo
     *
     * @return integer
     */
    public function getNanalyselabo()
    {
        return $this->nanalyselabo;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Anabel
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set dateprelevement
     *
     * @param \DateTime $dateprelevement
     *
     * @return Anabel
     */
    public function setDateprelevement($dateprelevement)
    {
        $this->dateprelevement = $dateprelevement;

        return $this;
    }

    /**
     * Get dateprelevement
     *
     * @return \DateTime
     */
    public function getDateprelevement()
    {
        return $this->dateprelevement;
    }

    /**
     * Set datereception
     *
     * @param \DateTime $datereception
     *
     * @return Anabel
     */
    public function setDatereception($datereception)
    {
        $this->datereception = $datereception;

        return $this;
    }

    /**
     * Get datereception
     *
     * @return \DateTime
     */
    public function getDatereception()
    {
        return $this->datereception;
    }

    /**
     * Set dateanalyse
     *
     * @param \DateTime $dateanalyse
     *
     * @return Anabel
     */
    public function setDateanalyse($dateanalyse)
    {
        $this->dateanalyse = $dateanalyse;

        return $this;
    }

    /**
     * Get dateanalyse
     *
     * @return \DateTime
     */
    public function getDateanalyse()
    {
        return $this->dateanalyse;
    }

    /**
     * Set datesaisie
     *
     * @param \DateTime $datesaisie
     *
     * @return Anabel
     */
    public function setDatesaisie($datesaisie)
    {
        $this->datesaisie = $datesaisie;

        return $this;
    }

    /**
     * Get datesaisie
     *
     * @return \DateTime
     */
    public function getDatesaisie()
    {
        return $this->datesaisie;
    }

    /**
     * Set ageanimal
     *
     * @param string $ageanimal
     *
     * @return Anabel
     */
    public function setAgeanimal($ageanimal)
    {
        $this->ageanimal = $ageanimal;

        return $this;
    }

    /**
     * Get ageanimal
     *
     * @return string
     */
    public function getAgeanimal()
    {
        return $this->ageanimal;
    }

    /**
     * Set nanimal
     *
     * @param integer $nanimal
     *
     * @return Anabel
     */
    public function setNanimal($nanimal)
    {
        $this->nanimal = $nanimal;

        return $this;
    }

    /**
     * Get nanimal
     *
     * @return integer
     */
    public function getNanimal()
    {
        return $this->nanimal;
    }

    /**
     * Set ageanimalautre
     *
     * @param string $ageanimalautre
     *
     * @return Anabel
     */
    public function setAgeanimalautre($ageanimalautre)
    {
        $this->ageanimalautre = $ageanimalautre;

        return $this;
    }

    /**
     * Get ageanimalautre
     *
     * @return string
     */
    public function getAgeanimalautre()
    {
        return $this->ageanimalautre;
    }

    /**
     * Set descriptionautre
     *
     * @param string $descriptionautre
     *
     * @return Anabel
     */
    public function setDescriptionautre($descriptionautre)
    {
        $this->descriptionautre = $descriptionautre;

        return $this;
    }

    /**
     * Get descriptionautre
     *
     * @return string
     */
    public function getDescriptionautre()
    {
        return $this->descriptionautre;
    }

    /**
     * Set laboratoireautre
     *
     * @param string $laboratoireautre
     *
     * @return Anabel
     */
    public function setLaboratoireautre($laboratoireautre)
    {
        $this->laboratoireautre = $laboratoireautre;

        return $this;
    }

    /**
     * Get laboratoireautre
     *
     * @return string
     */
    public function getLaboratoireautre()
    {
        return $this->laboratoireautre;
    }

    /**
     * Set prelevementautre
     *
     * @param string $prelevementautre
     *
     * @return Anabel
     */
    public function setPrelevementautre($prelevementautre)
    {
        $this->prelevementautre = $prelevementautre;

        return $this;
    }

    /**
     * Get prelevementautre
     *
     * @return string
     */
    public function getPrelevementautre()
    {
        return $this->prelevementautre;
    }

    /**
     * Set motifanalyseautre
     *
     * @param string $motifanalyseautre
     *
     * @return Anabel
     */
    public function setMotifanalyseautre($motifanalyseautre)
    {
        $this->motifanalyseautre = $motifanalyseautre;

        return $this;
    }

    /**
     * Get motifanalyseautre
     *
     * @return string
     */
    public function getMotifanalyseautre()
    {
        return $this->motifanalyseautre;
    }

    /**
     * Set avortement
     *
     * @param \VetBundle\Entity\Avortement $avortement
     *
     * @return Anabel
     */
    public function setAvortement(\VetBundle\Entity\Avortement $avortement = null)
    {
        $this->avortement = $avortement;

        return $this;
    }

    /**
     * Get avortement
     *
     * @return \VetBundle\Entity\Avortement
     */
    public function getAvortement()
    {
        return $this->avortement;
    }

    /**
     * Set bacteriologieautreorganes
     *
     * @param \VetBundle\Entity\BacteriologieAutresOrganes $bacteriologieautreorganes
     *
     * @return Anabel
     */
    public function setBacteriologieautresorganes(\VetBundle\Entity\BacteriologieAutresOrganes $bacteriologieautreorganes = null)
    {
        $this->bacteriologieautresorganes = $bacteriologiesautreorganes;

        return $this;
    }

    /**
     * Get bacteriologieautressorganes
     *
     * @return \VetBundle\Entity\BacteriologieAutresOrganes
     */
    public function getBacteriologieautresorganes()
    {
        return $this->bacteriologieautresorganes;
    }

    /**
     * Set bacteriologiefeces
     *
     * @param \VetBundle\Entity\BacteriologieFeces $bacteriologiefeces
     *
     * @return Anabel
     */
    public function setBacteriologiefeces(\VetBundle\Entity\BacteriologieFeces $bacteriologiefeces = null)
    {
        $this->bacteriologiefeces = $bacteriologiefeces;

        return $this;
    }

    /**
     * Get bacteriologiefeces
     *
     * @return \VetBundle\Entity\BacteriologieFeces
     */
    public function getBacteriologiefeces()
    {
        return $this->bacteriologiefeces;
    }

    /**
     * Set bacteriologielaitmammite
     *
     * @param \VetBundle\Entity\BacteriologieLaitMammite $bacteriologielaitmammite
     *
     * @return Anabel
     */
    public function setBacteriologielaitmammite(\VetBundle\Entity\BacteriologieLaitMammite $bacteriologielaitmammite = null)
    {
        $this->bacteriologielaitmammite = $bacteriologielaitmammite;

        return $this;
    }

    /**
     * Get bacteriologielaitmammite
     *
     * @return \VetBundle\Entity\BacteriologieLaitMammite
     */
    public function getBacteriologielaitmammite()
    {
        return $this->bacteriologielaitmammite;
    }

    /**
     * Set comptagecellulaire
     *
     * @param \VetBundle\Entity\ComptageCellulaire $comptagecellulaire
     *
     * @return Anabel
     */
    public function setComptagecellulaire(\VetBundle\Entity\ComptageCellulaire $comptagecellulaire = null)
    {
        $this->comptagecellulaire = $comptagecellulaire;

        return $this;
    }

    /**
     * Get comptagecellulaire
     *
     * @return \VetBundle\Entity\ComptageCellulaire
     */
    public function getComptagecellulaire()
    {
        return $this->comptagecellulaire;
    }

    /**
     * Set inhibiteurslait
     *
     * @param \VetBundle\Entity\InhibiteursLait $inhibiteurslait
     *
     * @return Anabel
     */
    public function setInhibiteurslait(\VetBundle\Entity\InhibiteursLait $inhibiteurslait = null)
    {
        $this->inhibiteurslait = $inhibiteurslait;

        return $this;
    }

    /**
     * Get inhibiteurslait
     *
     * @return \VetBundle\Entity\InhibiteursLait
     */
    public function getInhibiteurslait()
    {
        return $this->inhibiteurslait;
    }

    /**
     * Set parasitologie
     *
     * @param \VetBundle\Entity\Parasitologie $parasitologie
     *
     * @return Anabel
     */
    public function setParasitologie(\VetBundle\Entity\Parasitologie $parasitologie = null)
    {
        $this->parasitologie = $parasitologie;

        return $this;
    }

    /**
     * Get parasitologie
     *
     * @return \VetBundle\Entity\Parasitologie
     */
    public function getParasitologie()
    {
        return $this->parasitologie;
    }

    /**
     * Set pcr
     *
     * @param \VetBundle\Entity\PCR $pcr
     *
     * @return Anabel
     */
    public function setPcr(\VetBundle\Entity\PCR $pcr = null)
    {
        $this->pcr = $pcr;

        return $this;
    }

    /**
     * Get pcr
     *
     * @return \VetBundle\Entity\PCR
     */
    public function getPcr()
    {
        return $this->pcr;
    }

    /**
     * Set serologie
     *
     * @param \VetBundle\Entity\Serologie $serologie
     *
     * @return Anabel
     */
    public function setSerologie(\VetBundle\Entity\Serologie $serologie = null)
    {
        $this->serologie = $serologie;

        return $this;
    }

    /**
     * Get serologie
     *
     * @return \VetBundle\Entity\Serologie
     */
    public function getSerologie()
    {
        return $this->serologie;
    }

    /**
     * Set virologieautresorganes
     *
     * @param \VetBundle\Entity\VirologieAutresOrganes $virologieautresorganes
     *
     * @return Anabel
     */
    public function setVirologieautresorganes(\VetBundle\Entity\VirologieAutresOrganes $virologieautresorganes = null)
    {
        $this->virologieautresorganes = $virologieautresorganes;

        return $this;
    }

    /**
     * Get virologieautresorganes
     *
     * @return \VetBundle\Entity\VirologieAutresOrganes
     */
    public function getVirologieautresorganes()
    {
        return $this->virologieautresorganes;
    }

    /**
     * Set virologiefeces
     *
     * @param \VetBundle\Entity\VirologieFeces $virologiefeces
     *
     * @return Anabel
     */
    public function setVirologiefeces(\VetBundle\Entity\VirologieFeces $virologiefeces = null)
    {
        $this->virologiefeces = $virologiefeces;

        return $this;
    }

    /**
     * Get virologiefeces
     *
     * @return \VetBundle\Entity\VirologieFeces
     */
    public function getVirologiefeces()
    {
        return $this->virologiefeces;
    }
}
