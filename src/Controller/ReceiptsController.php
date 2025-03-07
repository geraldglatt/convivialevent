<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Recipe;
use App\Form\CommentaireType;
use App\Form\SearchType;
use App\Model\SearchData;
use App\Repository\CommentaireRepository;
use App\Repository\ImageRepository;
use App\Repository\RecipeIngredientRepository;
use App\Repository\RecipeRepository;
use App\Repository\RecipeStepRepository;
use App\Service\CommentaireService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/recettes', name: 'recettes_')]
class ReceiptsController extends AbstractController
{
    #[Route('/', name: 'list', methods: ['GET'])]
    public function list(
        RecipeRepository $recipeRepository, 
        Request $request
        ): Response
    {

        $searchData = new SearchData;
        $form = $this->createForm(SearchType::class, $searchData);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $searchData->page = $request->query->getInt('page', 1);
            $recipes = $recipeRepository->findBySearch($searchData);

            return $this->render('receipts/list.html.twig', [
                'form' => $form->createView(),
                'recipes' => $recipes
            ]);

        }

        return $this->render('receipts/list.html.twig', [
            'form' => $form->createView(),
            'recipes' => $recipeRepository->findPublished($request->query->getInt('page', 1))
        ]);
    }

    #[Route('/{slug}', name: 'detail')]
    public function detail(
    Recipe $recipe, 
    RecipeIngredientRepository $recipeIngredients, 
    RecipeStepRepository $recipeSteps,
    ImageRepository $recipeImage,
    Request $request,
    CommentaireService $commentaireService,
    CommentaireRepository $commentaireRepository
    ): Response
    {
        $commentaires = $commentaireRepository->findCommentaires($recipe);
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $commentaire = $form->getData();
            $commentaireService->persistCommentaire($commentaire,$recipe);

            $this->addFlash('success', 'Votre commentaire a bien été envoyé,nous vous en remercions !
            Il sera publié après vérification par l\'administrateur ');

            return $this->redirectToRoute('recettes_detail', ['slug' => $recipe->getSlug()]);

        }

        return $this->render('receipts/detail.html.twig', [
            'recipes' => $recipe,
            'recipeIngredients' => $recipeIngredients->findIngredientByRecipe($recipe->getId(), $recipeIngredients),
            'recipeSteps' => $recipeSteps->findBy(['recipe' => $recipe]),
            'recipeImage' => $recipeImage->findImageByRecipe($recipe->getId(), $recipeImage),
            'form' => $form->createView(),
            'commentaires' => $commentaires
        ]);
    }
}
