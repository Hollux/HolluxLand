<?php
namespace HolluxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MediaBundle\Entity\SuperMedia;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity(repositoryClass="MediaBundle\Repository\MediaRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Media extends SuperMedia
{
    /**
     * @ORM\OneToOne(targetEntity="User", mappedBy="avatar")
     */
    private $avatar;

    /**
     * Set avatar
     *
     * @param \HolluxBundle\Entity\User $avatar
     *
     * @return Media
     */
    public function setAvatar(\HolluxBundle\Entity\User $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \HolluxBundle\Entity\User
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}
