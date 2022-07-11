<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\RecipeType;
use App\Repository\RecipeRepository;
use App\Repository\RecipeStepRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\RecipeIngredientRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/receipts', name: 'receipts_')]
class ReceiptsController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function list(RecipeRepository $recipeRepository, PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);

        $form->handleRequest($request);
        $recipe = $paginatorInterface->paginate(
            $recipeRepository->findTypeAndDifficulty($recipe),
            $request->query->getInt('page', 1), /* page number */
            6 /* limit per page */
        );

            
    

        return $this->renderForm('receipts/list.html.twig', [
            'form' => $form,
            'receipts' => $recipeRepository->findBy([], ['id' => 'ASC'], 7),
            'recipe' => $recipe
            

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
