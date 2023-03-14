<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeType;
use App\Repository\ImageRepository;
use App\Repository\RecipeIngredientRepository;
use App\Repository\RecipeRepository;
use App\Repository\RecipeStepRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/receipts', name: 'receipts_', methods: ['GET', 'POST'])]
class ReceiptsController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(RecipeRepository $recipeRepository, Request $request): Response
    {
        $recipe = new Recipe();
        $recipes = new Recipe();

        $form = $this->createForm(RecipeType::class, $recipes);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $recipes = $form->getData();

            $recipes = $recipeRepository->findTypeAndDifficulty($recipes);
        }

        $recipe = $recipeRepository->findAll();

        return $this->renderForm('receipts/list.html.twig', [
            'form' => $form,
            'receipts' => $recipeRepository->findBy([], ['id' => 'ASC'], 8),
            'recipes' => $recipes,
            'recipe' => $recipe,
        ]);
    }

    #[Route('/{slug}', name: 'detail')]
    public function detail(
    Recipe $recipe, 
    RecipeIngredientRepository $recipeIngredients, 
    RecipeStepRepository $recipeSteps, ImageRepository $recipeImage
    ): Response
    {
        return $this->render('receipts/detail.html.twig', [
            'recipe' => $recipe,
            'recipeIngredients' => $recipeIngredients->findIngredientByRecipe($recipe->getId(), $recipeIngredients),
            'recipeSteps' => $recipeSteps->findBy(['recipe' => $recipe]),
            'recipeImage' => $recipeImage->findImageByRecipe($recipe->getId(), $recipeImage),
        ]);
    }
}
