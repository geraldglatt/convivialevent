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

        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $recipe = $form->getData();

            $recipes = $recipeRepository->findTypeAndDifficulty($recipe);
        }

        return $this->renderForm('receipts/list.html.twig', [
            'form' => $form,
            'receipts' => $recipeRepository->findBy([], ['id' => 'ASC'], 8),
            'recipes' => $recipes,
            'recipe' => $recipe,
        ]);
    }

    #[Route('/{slug}', name: 'detail')]
    public function detail(Recipe $recipe, 
    RecipeIngredientRepository $recipeIngredients, 
    RecipeStepRepository $recipeSteps, ImageRepository $image): Response
    {
        return $this->render('receipts/detail.html.twig', [
            'recipe' => $recipe,
            'recipeIngredients' => $recipeIngredients->findBy(['recipe' => $recipe]),
            'recipeSteps' => $recipeSteps->findBy(['recipe' => $recipe]),
            'image' => $image->findBy(['recipe' => $recipe]),
        ]);
    }
}
