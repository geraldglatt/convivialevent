<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i =0;$i <10;$i++)
        {
            $recipe = new Recipe();
            $recipe->setSlug('recipe'.$i);
            $recipe->setTitle('title'.$i);
            $recipe->setNbPortion('nbPortion'.$i);
            $manager->persist($recipe);
        }
        $manager->flush();
    }
}
