<?php

namespace App\Controller;

use App\Entity\Page;
use App\Repository\ImagesRepository;
use App\Repository\PagePdfRepository;
use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/page', name: 'page_')]
class PageController extends AbstractController
{
    #[Route('/{slug}', methods: ['GET'], name: 'show')]
    public function show(
    PageRepository $pageBlock,
    Page $pages,
    PageRepository $pageId,
    PagePdfRepository $pagePdf,
    ImagesRepository $findImage,
    ImagesRepository $imagesRepository
    ): Response {
        $findId = $pageId->findIdBypage($pages->getId(), $pageId);

        $findImages = $imagesRepository->findImageBypage($pages->getId(), $imagesRepository);

        // $findpdf = $pagePdf->findpdfpageChampêtre($pagePdf);
        $findPdfs = $pagePdf->findpdfBypage($pages->getId(), $pagePdf);

        return $this->render('page/show.html.twig', [
            'pagesBlock' => $pageBlock->findAll(),
            'pages' => $pages,
            'pagePdf' => $pagePdf,
            'images' => $findImage,
            'findId' => $findId,
            'findPdfs' => $findPdfs,
            'findImages' => $findImages,
        ]);
    }
}
