<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use AppBundle\Entity\SuperClass\File;
use UserBundle\Entity\SuperUser;

/**
 * User
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="HolluxBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User extends SuperUser
{
    use File;

    public function __construct()
    {
        parent::__construct();
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user      = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tokenJeux = new \Doctrine\Common\Collections\ArrayCollection();
        $this->response  = new \Doctrine\Common\Collections\ArrayCollection();
    }

/*
    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\MessageChat", mappedBy="user")
     */
    /*private $messagesChat;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Forum", mappedBy="author")
     */
   /* private $forum; */

    /**
     * @ORM\OneToMany(targetEntity="HolluxBundle\Entity\Response", mappedBy="user")
     */
    private $response;

    /**
     * @ORM\OneToMany(targetEntity="HolluxBundle\Entity\TokenJeux", mappedBy="user")
     */
    private $tokenJeux;

    /**
     * @ORM\OneToOne(targetEntity="Media", inversedBy="avatar", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="avatar_id", referencedColumnName="id", nullable=true, onDelete="set null")
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var \DateTime
     * @ORM\Column(name="inscriptionDate", type="datetime", nullable=true)
     */
    private $inscriptionDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="lastConnectionDate", type="datetime", nullable=true)
     */
    private $lastConnectionDate;

    /**
     * @ORM\Column(name="tokenMdp", type="string", length=255, nullable=true)
     */
    private $tokenMdp;


    /**
     * Set inscriptionDate
     * @param \DateTime $inscriptionDate
     * @return User
     */
    public function setInscriptionDate($inscriptionDate)
    {
        $this->inscriptionDate = $inscriptionDate;

        return $this;
    }

    /**
     * Get inscriptionDate
     * @return \DateTime
     */
    public function getInscriptionDate()
    {
        return $this->inscriptionDate;
    }

    /**
     * Set lastConnectionDate
     * @param \DateTime $lastConnectionDate
     * @return User
     */
    public function setLastConnectionDate($lastConnectionDate)
    {
        $this->lastConnectionDate = $lastConnectionDate;

        return $this;
    }

    /**
     * Get lastConnectionDate
     * @return \DateTime
     */
    public function getLastConnectionDate()
    {
        return $this->lastConnectionDate;
    }

    public function getUsername()
    {
        return $this->getLogin();
    }

    public function eraseCredentials()
    {
        // Ici nous n'avons rien à effacer.
    }


    /**
     * @ORM\PrePersist()
     */
    public function datePrePersist()
    {
        $this->setInscriptionDate(new \DateTime("now"));
    }

    /**
     * @ORM\PreUpdate()
     */
    public function datePreUpdate()
    {
        $this->setLastConnectionDate(new \DateTime("now"));
    }

    /**
     * Set tokenMdp
     *
     * @param string $tokenMdp
     *
     * @return User
     */
    public function setTokenMdp($tokenMdp)
    {
        $this->tokenMdp = $tokenMdp;

        return $this;
    }

    /**
     * Get tokenMdp
     *
     * @return string
     */
    public function getTokenMdp()
    {
        return $this->tokenMdp;
    }

    /**
     * Add tokenJeux
     * @param \HolluxBundle\Entity\TokenJeux $tokenJeux
     * @return User
     */
    public function addTokenJeux(\HolluxBundle\Entity\TokenJeux $tokenJeux)
    {
        $this->tokenJeux[] = $tokenJeux;

        return $this;
    }

    /**
     * Remove tokenJeux
     * @param \HolluxBundle\Entity\tokenJeux $tokenJeux
     */
    public function removeTokenJeux(\HolluxBundle\Entity\TokenJeux $tokenJeux)
    {
        $this->tokenJeux->removeElement($tokenJeux);
    }

    /**
     * Get tokenJeux
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTokenJeux()
    {
        return $this->tokenJeux;
    }

    /**
     * Add response
     * @param \HolluxBundle\Entity\Response $response
     * @return User
     */
    public function addResponse(\HolluxBundle\Entity\Response $response)
    {
        $this->response[] = $response;

        return $this;
    }

    /**
     * Remove response
     * @param \HolluxBundle\Entity\Response $response
     */
    public function removeResponse(\HolluxBundle\Entity\Response $response)
    {
        $this->response->removeElement($response);
    }

    /**
     * Get response
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set avatar
     *
     * @param \HolluxBundle\Entity\Media $avatar
     *
     * @return User
     */
    public function setAvatar(\HolluxBundle\Entity\Media $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \HolluxBundle\Entity\Media
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Set tokenPassword
     *
     * @param string $tokenPassword
     *
     * @return User
     */
    public function setTokenPassword($tokenPassword)
    {
        $this->tokenPassword = $tokenPassword;

        return $this;
    }

    /**
     * Get tokenPassword
     *
     * @return string
     */
    public function getTokenPassword()
    {
        return $this->tokenPassword;
    }
}
