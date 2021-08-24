<?php

namespace App\Controller;

use App\Entity\Mission;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionController extends AbstractController
{
    #[Route('/mission/{id}', name: 'mission')]
    public function index(Mission $mission): Response
    {
        return $this->render('mission/index.html.twig', [
            'controller_name' => 'MissionController',
            'mission' => $mission,
        ]);
    }
}
