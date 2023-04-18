<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use App\Entity\HomeBlock;
use App\Entity\Images;
use App\Entity\Page;
use App\Entity\PagePdf;
use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
  public function __construct(private AdminUrlGenerator $adminUrlGenerator)
  {
  }

  #[Route('/admin', name: 'admin')]
  public function index(): Response
  {
    $url = $this->adminUrlGenerator
      ->setController(HomeBlockCrudController::class)
      ->generateUrl();

    return $this->redirect($url);
  }

  public function configureDashboard(): Dashboard
  {
    return Dashboard::new()
      ->setTitle('Convivialevent');
  }

  public function configureMenuItems(): iterable
  {
    yield MenuItem::linkToRoute('back to the website', 'fas fa-home', 'app_home');
    yield MenuItem::linkToCrud('HomeBlock', 'fas fa-book', HomeBlock::class);
    yield MenuItem::section('page(A Charger avant la partie homeblock)');
    yield MenuItem::linkToCrud('Page', 'fas fa-book', Page::class);
    yield MenuItem::section('images');
    yield MenuItem::linkToCrud('images', 'fas fa-book', Images::class);
    yield MenuItem::section('Pdf');
    yield MenuItem::linkToCrud('Pdf', 'fas fa-file-pdf', PagePdf::class);
    yield MenuItem::section('Recettes');
    yield MenuItem::linkToCrud('Recettes', 'fas fa-book', Recipe::class);
    yield MenuItem::section('Commentaire');
    yield MenuItem::linkToCrud('Commentaire', 'fas fa-comment', Commentaire::class);
  }
}
