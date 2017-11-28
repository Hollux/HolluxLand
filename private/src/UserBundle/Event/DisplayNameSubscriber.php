<?php
namespace UserBundle\Event;

use UserBundle\Event\TotoEvent;
use UserBundle\UserBundleEvents;


class DisplayNameSubscriber
{

/*    public static function getSubscribedEvents()
    {
        return [UserBundleEvents::EchoGetname => ['afficheUser', 0]];
    }*/

    public function afficheUser(TotoEvent $event)
    {
        $event->addResult($event->getUser()->getName());

    }
}