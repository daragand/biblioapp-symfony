<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Client;
use App\Entity\Editor;
use App\Entity\Format;
use App\Entity\Category;
use App\Entity\Language;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
      // return parent::index();

    

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
         return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Biblioapp');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Bibliothèques');
        yield MenuItem::linkToCrud('Livres', 'fa fa-book', Book::class);
        yield MenuItem::section('Autorités');
        yield MenuItem::linkToCrud('Auteurs', 'fas fa-feather', Author::class);
        yield MenuItem::linkToCrud('Editeur', 'fas fa-building', Editor::class);
        yield MenuItem::section('Paramètres');
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Format', 'fas fa-arrows-up-down-left-right', Format::class);
        yield MenuItem::linkToCrud('Langages', 'fas fa-language', Language::class);
        yield MenuItem::section('Clients');
        yield MenuItem::linkToCrud('Clients', 'fa fa-user', Client::class);
        yield MenuItem::section('Autres');
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-arrow-left','app_page');
    }
}