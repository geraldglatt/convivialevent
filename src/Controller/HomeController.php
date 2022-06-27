<?php

namespace App\Controller;

use App\Repository\HomeBlockRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HomeBlockRepository $homeBlockRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'weddings' => $homeBlockRepository->findBy([], ['position' => 'ASC'], 4),
        ]);
    }
}
