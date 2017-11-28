<?php
namespace AppBundle\Entity\SuperClass;

trait MediaTrait
{
    private $media;

    /**
     * Set media
     *
     * @param \MediaBundle\Entity\Media $media
     *
     * @return Portfolio
     */
    public function setMedia(MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \MediaBundle\Entity\Media $media
     */
    public function getMedia()
    {
        return $this->media;
    }
}