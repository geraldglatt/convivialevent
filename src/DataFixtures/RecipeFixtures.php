<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture
{
    public const RECIPE_REFERENCE1 = 'RECIPE_REFERENCE1';
    public const RECIPE_REFERENCE2 = 'RECIPE_REFERENCE2';
   
    
    public function load(ObjectManager $manager): void
    {
       
        
            $recipe = new Recipe();
            $recipe->setSlug('recipe1');
            $recipe->setTitle('title1');
            $recipe->setNbPortion('nbPortion1');
            $manager->persist($recipe);
            $this->addReference(self::RECIPE_REFERENCE1 , $recipe);

            $recipe = new Recipe();
            $recipe->setSlug('recipe2');
            $recipe->setTitle('title2');
            $recipe->setNbPortion('nbPortion2');
            $manager->persist($recipe);
            $this->addReference(self::RECIPE_REFERENCE2 , $recipe);
        
        
        $manager->flush();
    }


}
