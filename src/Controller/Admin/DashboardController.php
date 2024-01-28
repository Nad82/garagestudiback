<?php

namespace App\Controller\Admin;

use App\Entity\Employe;
use App\Entity\FormulaireG;
use App\Entity\FormulaireV;
use App\Entity\Horaires;
use App\Entity\Services;
use App\Entity\Temoignage;
use App\Entity\Vehicule;
use App\Entity\VehiculeImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use symfony\Component\Inlt\Locale;


class DashboardController extends AbstractDashboardController
{
    #[Route(
        '/admin',
        name: 'admin',
    )]


    public function index(): Response
    {
        return $this->render('admin\dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V.Parrot Administration')
            ->setFaviconPath('<link rel= "favicon" href= "faviconGVP.svg">')
            ->renderContentMaximized()
            ->renderSidebarMinimized();
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->displayUserAvatar(true)
            ->addMenuItems([
                MenuItem::linkToRoute('Mon Profil', 'fa fa-id-card', 'home'),
                MenuItem::linkToRoute('Settings', 'fa fa-user-cog', 'home'),
            ]);
    }

    public function configureMenuItems(): iterable
    {
        return [

            MenuItem::section('Employé')->setPermission('ROLE_USER'),
            MenuItem::linkToCrud('Gestion des véhicules', 'fas fa-car', Vehicule::class),
            MenuItem::linkToCrud('Liste des formulaires de contact pour les véhicules', 'fa fa-file', FormulaireV::class),
            MenuItem::linkToCrud('Liste des formulaires de contact pour le garage', 'fa fa-file-text-o', FormulaireG::class),
            MenuItem::linkToCrud('Liste des témoignages', 'fa fa-comment', Temoignage::class),
            MenuItem::linkToCrud('Gestion des images', 'fa fa-file-image-o', VehiculeImage::class),


            MenuItem::section('Administrateur')->setPermission('ROLE_ADMIN'),
            MenuItem::linkToCrud('Liste des employés', 'fas fa-users', Employe::class),
            MenuItem::linkToCrud('Gestion des horaires', 'fas fa-clock', Horaires::class),
            MenuItem::linkToCrud('Gestion des services', 'fas fa-tools', Services::class),
        ];
    }
}
