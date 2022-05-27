<?php

namespace App\DataFixtures;

use App\Entity\RecipeStep;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeStepFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach([RecipeFixtures::RECIPE_REFERENCE1,RecipeFixtures::RECIPE_REFERENCE2] as $ref){
            for($i = 0;$i <10;$i++)
            {
                $recipeStep = new RecipeStep();
                $recipeStep->setTitle('title'.$i);
                $recipeStep->setContent('content'.$i);
                $recipeStep->setPosition('position'.$i);
                $recipeStep->setRecipe($this->getReference($ref));
                $manager->persist($recipeStep);
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

