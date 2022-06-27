<?php

namespace App\DataFixtures;

use App\Entity\RecipeIngredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeIngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach ([RecipeFixtures::RECIPE_REFERENCE1, RecipeFixtures::RECIPE_REFERENCE2] as $ref) {
            for ($i = 0; $i < 10; ++$i) {
                $recipeIngredient = new RecipeIngredient();
                $recipeIngredient->setName('name'.$i);
                $recipeIngredient->setQuantity($i);
                $recipeIngredient->setQuantityName('quantity_name'.$i);

                /** @var \App\Entity\Recipe */
                $recipe = $this->getReference($ref);
                $recipeIngredient->setRecipe($recipe);

                $manager->persist($recipeIngredient);
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
