<?php

namespace App\DataFixtures;

use App\Entity\RecipeStep;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipestepFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0;$i <10;$i++)
        {
            $recipeStep = new RecipeStep();
            $recipeStep->setTitle('title'.$i);
            $recipeStep->setContent('content'.$i);
            $recipeStep->setPosition('position'.$i);
            $manager->persist($recipeStep);
        }
        $manager->flush();
    }
}
