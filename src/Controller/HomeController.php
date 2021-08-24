<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MissionRepository;
use Knp\Component\Pager\PaginatorInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        MissionRepository $missionRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $data = $missionRepository->findAll();
        $missions = $paginator->paginate($data, $request->query->getInt('page', 1), 3);
        
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'missions' => $missions,
        ]);
    }
}
