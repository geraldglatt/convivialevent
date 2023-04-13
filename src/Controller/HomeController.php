<?php

namespace App\Controller;

use App\Repository\HomeBlockRepository;
use App\Repository\ImagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: '')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(HomeBlockRepository $homeBlockRepository): Response
    {
        return $this->render('home/home.html.twig', [
            'weddings' => $homeBlockRepository->findBy([], ['position' => 'ASC'], 6),
        ]);
    }

    #[Route('/mentions_legales', name: 'mentions_legales')]
    public function mentionsLegales(): Response
    {
        return $this->render('home/mentionsLegales.html.twig');
    }

    #[Route('/partenaires', name: 'partenaires')]
    public function partenaires(): Response
    {
        return $this->render('home/partenaires.html.twig');
    }

    #[Route('/galerie', name: 'galerie')]
    public function galerie(ImagesRepository $galerie): Response
    {
        return $this->render('home/galerie.html.twig', [
            'galerie' => $galerie->findAll()
        ]);
    }
}
