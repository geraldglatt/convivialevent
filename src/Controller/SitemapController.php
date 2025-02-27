<?php

namespace App\Controller;

use App\Repository\PageRepository;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', defaults:['_format'=>'xml'])]
    public function index(
        Request $request,
        PageRepository $pageRepository,
        RecipeRepository $recipeRepository,
        ): Response
    {
        $hostname = $request->getSchemeAndHttpHost();
        $urls = [];
        $urls[] = ['loc' => $this->generateUrl('app_home')];
        $urls[] = ['loc' => $this->generateUrl('app_galerie')];
        $urls[] = ['loc' => $this->generateUrl('app_contact')];
        // $urls[] = ['loc' => $this->generateUrl('page_show')];
        $urls[] = ['loc' => $this->generateUrl('app_partenaires')];
        $urls[] = ['loc' => $this->generateUrl('app_mentions_legales')];

        foreach($pageRepository->findAll() as $page) {
            $urls = [
                'loc' => $this->generateUrl('page_show', ['slug'=>$page->getSlug()]),
                'lastmod' => $page->getUpdatedAt()->format('Y-m-d')
            ];
        }

        foreach($recipeRepository->findAll() as $recipe) {
            $urls = [
                'loc' => $this->generateUrl('app_recettes_list', ['slug'=>$recipe->getSlug()]),
                'lastmod' => $recipe->getUpdatedAt()->format('Y-m-d')
            ];
        }

        // foreach($recipeRepository->findAll() as $recipes) {
        //     $urls = [
        //         'loc' => $this->generateUrl('app_recettes_detail', ['slug'=>$recipes->getSlug()]),
        //         'lastmod' => $recipes->getUpdatedAt()->format('Y-m-d')
        //     ];
        // }

        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls' => $urls,
                'hostname' => $hostname,
            ]),
            200
        );

        $response->headers->set('Content-type', 'text/xml');

        return $response;
    }
}
