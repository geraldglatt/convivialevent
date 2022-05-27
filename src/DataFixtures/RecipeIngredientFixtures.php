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
        foreach([RecipeFixtures::RECIPE_REFERENCE1,RecipeFixtures::RECIPE_REFERENCE2] as $ref){
            for($i = 0;$i <10;$i++)
            {
                $RecipeIngredient = new RecipeIngredient();
                $RecipeIngredient->setName('name'.$i);
                $RecipeIngredient->setQuantity($i);
                $RecipeIngredient->setQuantityName('quantity_name'.$i);
                $RecipeIngredient->setRecipe($this->getReference($ref));
                $manager->persist($RecipeIngredient);
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
