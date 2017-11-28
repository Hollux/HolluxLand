<?php
namespace UserBundle\Event;

class SuperTotoEvent
{
    public function onTotoEvent($event) {
        echo $event;
        echo 'OnTotoEvent !';
        exit;
    }
}