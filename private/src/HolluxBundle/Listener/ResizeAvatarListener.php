<?php
namespace HolluxBundle\Listener;

class ResizeAvatarListener
{
    protected $resizeImage;

    public function __construct($resizeImage)
    {
        $this->resizeImage = $resizeImage;
    }



}