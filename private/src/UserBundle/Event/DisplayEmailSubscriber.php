<?php
namespace UserBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use UserBundle\Event\TotoEvent;
use UserBundle\UserBundleEvents;


class DisplayEmailSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [UserBundleEvents::EchoGetname => ['afficheUser', 0]];
    }

    public function afficheUser(TotoEvent $event)
    {
        $event->addResult($event->getUser()->getLogin());
    }

    public function preProfil(TotoEvent $event)
    {
        $event->addResult($event->getUser()->getLogin());
    }
}
