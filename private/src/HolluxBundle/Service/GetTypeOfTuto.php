<?php
namespace HolluxBundle\Service;

class GetTypeOfTuto
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function getTypeOfTuto()
    {
        $type = $this->session->get('tutotype');
        if(!$type)
            $type = 'soft';

        return $type;
    }

}