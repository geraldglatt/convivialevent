<?php

namespace App\Controller\Admin;

use App\Entity\HomeBlock;
use App\Entity\Page;
use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
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
    yield
      MenuItem::linkToRoute('back to the website', 'fas fa-home', 'app_home');

    yield MenuItem::linkToCrud('HomeBlock', 'fas fa-book', HomeBlock::class);
    yield MenuItem::section('page');
    yield MenuItem::linkToCrud('Page', 'fas fa-book', Page::class);

    // yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
    //       MenuItem::linkToCrud('Create page', 'fas fa-plus', Page::class)->setAction(Crud::PAGE_NEW),
    // ]);

    yield MenuItem::section('Recipe');
    yield MenuItem::linkToCrud('Recipe', 'fas fa-book', Recipe::class);

    // yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
    //   MenuItem::linkToCrud('Create recipe', 'fas fa-plus', Recipe::class)->setAction(Crud::PAGE_NEW),
    // ]);

    // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
  }
}
