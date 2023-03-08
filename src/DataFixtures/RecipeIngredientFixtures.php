<?php

namespace App\DataFixtures;

use App\Entity\RecipeIngredient;
use App\Repository\RecipeRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeIngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(
        private RecipeRepository $recipeRepository,
    )
    {}

    public function load(
    ObjectManager $manager
    ): void
    {

        $recipes = $this->recipeRepository->findAll();

        //RecipeIngredient
        $recipeIngredients = [];

            for ($i = 0; $i < 10; ++$i) {
                $recipeIngredient = new RecipeIngredient();
                $recipeIngredient->setName('name'.$i);
                $recipeIngredient->setQuantity($i);
                $recipeIngredient->setQuantityName('quantity_name'.$i);

                // /** @var \App\Entity\Recipe */
                // $recipe = $this->getReference($ref);
                // $recipeIngredient->setRecipe($recipe);

                $recipeIngredients[] = $recipeIngredient;
                $manager->persist($recipeIngredient);
            }

            foreach($recipes as $r) {
                for($i =0; $i < mt_rand(0,3);$i++) {
                    $r->addIngredient(
                        $recipeIngredients[mt_rand(0, count($recipeIngredients)-1 )]
                    );
                }
            }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RecipeFixtures::class,
        ];
    }
}
