<?php

namespace App\Controller\Admin;

use App\Entity\HomeBlock;
use App\Entity\Image;
use App\Entity\Images;
use App\Entity\Page;
use App\Entity\PagePdf;
use App\Entity\Recipe;
use App\Entity\RecipeIngredient;
use App\Entity\RecipeStep;
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
        yield MenuItem::section('HomePage');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create HomePage', 'fas-fa-plus', HomeBlock::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show HomePage', 'fas-fas-eye', HomeBlock::class),
        ]);

        yield MenuItem::section('page');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create page', 'fas-fa-plus', Page::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show page', 'fas-fas-eye', Page::class),
        ]);

        yield MenuItem::section('pagePdf');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create pdf', 'fas-fa-plus', PagePdf::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show pdf', 'fas-fas-eye', PagePdf::class),
        ]);

        yield MenuItem::section('pageImages');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create pageImages', 'fas-fa-plus', Images::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show pageImages', 'fas-fas-eye', Images::class),
        ]);

        yield MenuItem::section('Recipe');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create recipe', 'fas-fa-plus', Recipe::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show recipe', 'fas-fas-eye', Recipe::class),
        ]);

        yield MenuItem::section('RecipeIngredients');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create ingredients', 'fas-fa-plus', RecipeIngredient::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show ingredients', 'fas-fas-eye', RecipeIngredient::class),
        ]);

        yield MenuItem::section('RecipeSteps');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create step', 'fas-fa-plus', RecipeStep::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show step', 'fas-fas-eye', RecipeStep::class),
        ]);

        yield MenuItem::section('RecipeImage');

        yield MenuItem::subMenu('Actions', 'fas-fa-bars')->setSubItems([
              MenuItem::linkToCrud('Create image', 'fas-fa-plus', Image::class)->setAction(Crud::PAGE_NEW),
              MenuItem::linkToCrud('show image', 'fas-fas-eye', Image::class),
        ]);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
