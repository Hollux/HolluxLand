<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageChat
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageChatRepository")
 * @ORM\Table(name="messagechat")
 */
class MessageChat
{
	/**
	 * @var integer
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string
	 * @ORM\Column(type="text")
	 */
	private $content;

	/**
	 * @var string
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $createdAt;

	/**
	 * @ORM\ManyToOne(targetEntity="HolluxBundle\Entity\User", inversedBy="messagesChat", cascade={"persist","remove"})
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true, onDelete="set null")
	 */
	private $user;

	public function __construct()
	{
		$this->createdAt = new \dateTime('now');
	}

	public function getId()
	{
		return $this->id;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getCreated_at()
	{
		return $this->createdAt;
	}

	/**
	 * Set createdAt
	 * @param \DateTime $createdAt
	 * @return MessageChat
	 */
	public function setCreatedAt($createdAt)
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	/**
	 * Get createdAt
	 * @return \DateTime
	 */
	public function getCreatedAt()
	{
		return $this->createdAt;
	}


	public function tojson()
	{
		return ['id'   => $this->getId(), 'user' => $this->getUser()->getName(),
		        'time' => $this->getCreated_at()->format('H:i'), 'content' => $this->getContent()];
	}

    /**
     * Set user
     *
     * @param \HolluxBundle\Entity\User $user
     *
     * @return MessageChat
     */
    public function setUser(\HolluxBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \HolluxBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
