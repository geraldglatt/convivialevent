<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture 
{
    public const RECIPE_REFERENCE1 = 'RECIPE_REFERENCE1';
    public const RECIPE_REFERENCE2 = 'RECIPE_REFERENCE2';
    public const RECIPE_REFERENCE3 = 'RECIPE_REFERENCE3';
    public const RECIPE_REFERENCE4 = 'RECIPE_REFERENCE4';

    public function load(ObjectManager $manager): void
    {
        $date1 = '01h00';
        $recipe = new Recipe();
        $recipe->setSlug('recipe1');
        $recipe->setTitle('title1');
        $recipe->setNbPortion(1);
        $recipe->setType('entrée');
        $recipe->setDifficulty('facile');
        $recipe->setTime($date1);
        $manager->persist($recipe);
        $this->addReference(self::RECIPE_REFERENCE1, $recipe);

        $date2 = '00h30';
        $recipe2 = new Recipe();
        $recipe2->setSlug('recipe2');
        $recipe2->setTitle('title2');
        $recipe2->setNbPortion(1);
        $recipe2->setType('pièces cocktail');
        $recipe2->setDifficulty('moyen');
        $recipe2->setTime($date2);
        $manager->persist($recipe2);
        $this->addReference(self::RECIPE_REFERENCE2, $recipe);

        $date3 = '00h45';
        $recipe3 = new Recipe();
        $recipe3->setSlug('recipe3');
        $recipe3->setTitle('title3');
        $recipe3->setNbPortion(1);
        $recipe3->setType('Plats chauds');
        $recipe3->setDifficulty('moyen');
        $recipe3->setTime($date3);
        $manager->persist($recipe3);
        $this->addReference(self::RECIPE_REFERENCE3, $recipe);

        $date4 = '01h15';
        $recipe4 = new Recipe();
        $recipe4->setSlug('recipe4');
        $recipe4->setTitle('title4');
        $recipe4->setNbPortion(1);
        $recipe4->setType('Entrée');
        $recipe4->setDifficulty('Facile');
        $recipe4->setTime($date4);
        $manager->persist($recipe4);
        $this->addReference(self::RECIPE_REFERENCE4, $recipe);

        $manager->flush();
    } 
}
