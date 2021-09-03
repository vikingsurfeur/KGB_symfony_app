<?php

namespace App\EventSubscriber;

use App\Entity\Mission;
use App\Entity\Agent;
use App\Entity\Contact;
use App\Entity\Hideout;
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
                ['checkPersistHideoutNationality'],
            ],
            BeforeEntityUpdatedEvent::class => [
                ['checkUpdateAgentNationality'],
                ['checkUpdateContactNationality'],
                ['checkUpdateHideoutNationality'],
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
        $targetNationalities = $entity->getMission()->getTargets()->map(function($nationalities){
            return $nationalities->getNationality();
        });

        foreach ($targetNationalities as $targetNationality)
        {
            if ($targetNationality === $agentNationality) {
                throw new \Exception('Agent and Target have the same nationality, it\'s not possible');
            }
        }
        
        $agentSkills = $entity->getSkills()->map(function($skills){
            return $skills->getTitle();
        });
        $missionSkill = $entity->getMission()->getSkillRequirement();

        foreach($agentSkills as $agentSkill)
        {
            if ($agentSkill !== $missionSkill) {
                throw new \Exception('Agent must have one skill requirement for this mission');
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
        $targetNationalities = $entity->getMission()->getTargets()->map(function($nationalities){
            return $nationalities->getNationality();
        });

        foreach ($targetNationalities as $targetNationality)
        {
            if ($targetNationality === $agentNationality) {
                throw new \Exception('Agent and Target have the same nationality, it\'s not possible');
            }
        }
        
        // $agentSkills = $entity->getSkills()->map(function($skills){
        //     return $skills->getTitle();
        // });
        // $missionSkill = $entity->getMission()->getSkillRequirement();

        // foreach($agentSkills as $agentSkill)
        // {
        //     if ($agentSkill !== $missionSkill) {
        //         throw new \Exception('Agent must have one skill requirement for this mission');
        //     }
        // }
    }

    public function checkPersistContactNationality(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Contact) {
            return;
        }

        if ($entity->getMission() !== null) {
            $contactNationality = $entity->getNationality();
            $missionCountry = $entity->getMission()->getCountry();
    
            if ($missionCountry !== $contactNationality) {
                throw new \Exception('Contact must come from the mission country');
            }
        }
    }

    public function checkUpdateContactNationality(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Contact) {
            return;
        }

        if ($entity->getMission() !== null) {
            $contactNationality = $entity->getNationality();
            $missionCountry = $entity->getMission()->getCountry();
    
            if ($missionCountry !== $contactNationality) {
                throw new \Exception('Contact must come from the mission country');
            }
        }
    }

    public function checkPersistHideoutNationality(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Hideout) {
            return;
        }

        if ($entity->getMission() !== null) {
            $hideoutCountry = $entity->getCountry();
            $missionCountry = $entity->getMission()->getCountry();
    
            if ($missionCountry !== $hideoutCountry) {
                throw new \Exception('Hideout must come from the mission country');
            }
        }
    }

    public function checkUpdateHideoutNationality(BeforeEntityUpdatedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!$entity instanceof Hideout) {
            return;
        }

        if ($entity->getMission() !== null) {
            $hideoutCountry = $entity->getCountry();
            $missionCountry = $entity->getMission()->getCountry();
    
            if ($missionCountry !== $hideoutCountry) {
                throw new \Exception('Hideout must come from the mission country');
            }
        }
    }
}