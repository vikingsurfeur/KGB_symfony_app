<?php

namespace App\Controller\Admin;

use App\Entity\Mission;
use App\Entity\User;
use App\Entity\Agent;
use App\Entity\Contact;
use App\Entity\Hideout;
use App\Entity\Skill;
use App\Entity\Target;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('KGB Symfony App');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Mission', 'fas fa-list', Mission::class);
        yield MenuItem::linkToCrud('Agent', 'fas fa-list', Agent::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('Hideout', 'fas fa-list', Hideout::class);
        yield MenuItem::linkToCrud('Skill', 'fas fa-list', Skill::class);
        yield MenuItem::linkToCrud('Target', 'fas fa-list', Target::class);
    }
}
