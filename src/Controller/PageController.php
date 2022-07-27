<?php

namespace App\Controller;

use App\Entity\Page;
use App\Repository\ImagesRepository;
use App\Repository\PagePdfRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/page', name: 'page_')]
class PageController extends AbstractController
{
    #[Route('/{slug}', methods: ['GET'], name: 'show')]
    public function show(Page $page, PagePdfRepository $pagePdf, ImagesRepository $images): Response
    {
        return $this->render('page/show.html.twig', [
            'page' => $page,
            'pagePdf' => $pagePdf->findBy(['page' => $page]),
            'images' => $images->findBy(['page' => $page]),
        ]);
    }
}
