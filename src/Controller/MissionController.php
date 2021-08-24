<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Repository\AgentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionController extends AbstractController
{
    #[Route('/mission/{id}', name: 'mission')]
    public function index(Mission $mission, AgentRepository $agentRepository): Response
    {
        return $this->render('mission/index.html.twig', [
            'controller_name' => 'MissionController',
            'mission' => $mission,
            'agents' => $agentRepository->findBy(['mission' => $mission->getId()]),
        ]);
    }
}
