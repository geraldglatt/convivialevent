<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeIngredientRepository;
use App\Repository\RecipeRepository;
use App\Repository\RecipeStepRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/receipts', name: 'receipts_')]
class ReceiptsController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(RecipeRepository $recipeRepository): Response
    {
        return $this->render('receipts/list.html.twig', [
            'receipts' => $recipeRepository->findBy([], ['id' => 'ASC']),
        ]);
    }

    #[Route('/{slug}', name: 'detail')]
    public function detail(Recipe $recipe, RecipeIngredientRepository $recipeIngredients, RecipeStepRepository $recipeSteps): Response
    {
        return $this->render('receipts/detail.html.twig', [
            'recipe' => $recipe,
            'recipeIngredients' => $recipeIngredients->findAll(),
            'recipeSteps' => $recipeSteps->findAll(),
        ]);
    }
}
