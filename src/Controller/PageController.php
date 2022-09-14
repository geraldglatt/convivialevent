<?php

namespace App\Controller;

use App\Entity\Page;
use App\Entity\PagePdf;
use App\Service\PdfService;
use App\Repository\ImagesRepository;
use App\Repository\PagePdfRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/page', name: 'page_')]
class PageController extends AbstractController
{
    #[Route('/{slug}', methods: ['GET'], name: 'show')]
    public function show(Page $page, PagePdfRepository $pagePdf, ImagesRepository $images): Response
    {
        return $this->render('page/show.html.twig', [
            'page' => $page,
            'pagePdf' => $pagePdf->findAll(),
            'images' => $images->findBy(['page' => $page]),
        ]);
    }

    // #[Route('/pdf/{id}', name: 'document.pdf')]
    // public function generatePdfDoc(PagePdf $pagePdf, PdfService $pdf)
    // {
    //     $html = $this->render('page/show.html.twig', ['pagepdf' => $pagePdf]);
    //     $pdf->showPdfFile($html);
    // }
   
}
