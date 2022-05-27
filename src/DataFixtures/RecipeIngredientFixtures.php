<?php

namespace App\DataFixtures;

use App\Entity\RecipeIngredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeIngredientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0;$i <10;$i++)
        {
            $RecipeIngredient = new RecipeIngredient();
            $RecipeIngredient->setName('name'.$i);
            $RecipeIngredient->setQuantity('quantity'.$i);
            $RecipeIngredient->setQuantityName('quantity_name'.$i);
            $manager->persist($RecipeIngredient);
        }
        $manager->flush();
    }
}
