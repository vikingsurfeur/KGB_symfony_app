<?php

namespace App\EventSubscriber;

use App\Entity\Mission;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => [
                ['setUserId'],
            ],
        ];
    }

    public function setUserId(BeforeEntityPersistedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Mission) {
            return;
        }

        $user = $this->security->getUser();
        $entity->setUser($user);
    }
}