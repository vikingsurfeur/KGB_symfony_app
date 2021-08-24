<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Repository\AgentRepository;
use App\Repository\ContactRepository;
use App\Repository\HideoutRepository;
use App\Repository\TargetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionController extends AbstractController
{
    #[Route('/mission/{id}', name: 'mission')]
    public function index(
        Mission $mission, 
        AgentRepository $agentRepository,
        ContactRepository $contactRepository,
        HideoutRepository $hideoutRepository,
        TargetRepository $targetRepository
    ): Response
    {
        return $this->render('mission/index.html.twig', [
            'controller_name' => 'MissionController',
            'mission' => $mission,
            'agents' => $agentRepository->findBy(['mission' => $mission->getId()]),
            'contacts' => $contactRepository->findBy(['mission' => $mission->getId()]),
            'hideouts' => $hideoutRepository->findBy(['mission' => $mission->getId()]),
            'targets' => $targetRepository->findBy(['mission' => $mission->getId()]),
        ]);
    }
}
