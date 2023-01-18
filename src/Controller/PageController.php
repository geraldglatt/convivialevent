<?php

namespace App\Controller;

use App\Entity\Images;
use App\Entity\Page;
use App\Entity\PagePdf;
use App\Service\PdfService;
use App\Repository\ImagesRepository;
use App\Repository\PagePdfRepository;
use App\Repository\PageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/page', name: 'page_')]
class PageController extends AbstractController
{
    #[Route('/{slug}', methods: ['GET'], name: 'show')]
    public function show(Page $pages, 
    PagePdfRepository $pagePdf, 
    ImagesRepository $findImage,
    ImagesRepository $imagesRepository
    ): Response
    {  
        
        $findImages = $imagesRepository->findImageBypage($pages->getId(), $imagesRepository);

        // $findpdf = $pagePdf->findpdfpageChampêtre($pagePdf);
        $findPdfs = $pagePdf->findpdfBypage($pages->getId(),$pagePdf);

        return $this->render('page/show.html.twig', [
            'pages' => $pages,
            'pagePdf' => $pagePdf,
            'images' => $findImage,
            'findPdfs' => $findPdfs,
            'findImages' => $findImages
        ]);
    }
   
}
