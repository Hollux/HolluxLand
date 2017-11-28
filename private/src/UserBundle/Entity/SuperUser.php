<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/** @ORM\MappedSuperclass */
class SuperUser implements UserInterface
{
    use TimestampableEntity;

    public function __construct(){
        $this->roles     = "ROLE_USER";
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255)
     */
    protected $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255)
     */
    protected $email;



    /**
     * @var string
     *
     * @ORM\Column(name="roles", type="string", length=255, nullable=true)
     */
    protected $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="tokenPassword", type="string", length=255, nullable=true)
     */
    protected $tokenPassword;


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
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
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
     * Get roles
     *
     * @return string
     */
    public function getRoles()
    {
        return is_array($this->roles) ? $this->roles : [$this->roles];
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return SuperUser
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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

    public function getSalt()
    {
        // Chaque utilisateur va se voir attribuer une clé permettant
        // de saler son mot de passe. Cela n'est pas obligatoire,
        // on pourrait retourner null
        return base_convert(sha1($this->getLogin()), 16, 36);
    }

    public function getUsername()
    {
        return $this->getName();
    }

    public function eraseCredentials()
    {
        // Ici nous n'avons rien à effacer.
    }
}

