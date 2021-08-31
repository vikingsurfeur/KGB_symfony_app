<?php

namespace App\EventSubscriber;

use App\Entity\Mission;
use App\Entity\Agent;
use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
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
                ['checkPersistAgentNationality'],
                ['checkPersistContactNationality'],
            ],
            BeforeEntityUpdatedEvent::class => [
                ['checkUpdateAgentNationality'],
                ['checkUpdateContactNationality'],
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

    public function checkPersistAgentNationality(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Agent) {
            return;
        }

        $agentNationality = $entity->getNationality();
        // select all the nationality of the targets in the mission entity
        $targetNationalities = $entity->getMission()->getTargets()->map(function($nationalities){
            return $nationalities->getNationality();
        });

        foreach ($targetNationalities as $targetNationality)
        {
            if ($targetNationality === $agentNationality) {
                throw new \Exception('Agent and Target have the same nationality, it\'s not possible');
            }
        }
    }

    public function checkUpdateAgentNationality(BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Agent) {
            return;
        }

        $agentNationality = $entity->getNationality();
        // select all the nationality of the targets in the mission entity
        $targetNationalities = $entity->getMission()->getTargets()->map(function($nationalities){
            return $nationalities->getNationality();
        });

        foreach ($targetNationalities as $targetNationality)
        {
            if ($targetNationality === $agentNationality) {
                throw new \Exception('Agent and Target have the same nationality, it\'s not possible');
            }
        }
    }

    public function checkPersistContactNationality(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Contact) {
            return;
        }

        $contactNationality = $entity->getNationality();
        // select all the nationality of the targets in the mission entity
        $missionCountry = $entity->getMission()->getCountry();

        if ($missionCountry !== $contactNationality) {
            throw new \Exception('Contact must come from the mission country');
        }
    }
}