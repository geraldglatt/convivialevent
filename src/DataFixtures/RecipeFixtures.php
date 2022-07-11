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
        $recipe = new Recipe();
        $recipe->setTitle('title1');
        $recipe->setNbPortion(1);
        $recipe->setType('entrée');
        $recipe->setDifficulty('facile');
        $recipe->setTime(45);
        $manager->persist($recipe);
        $this->addReference(self::RECIPE_REFERENCE1, $recipe);

        $recipe2 = new Recipe();
        $recipe2->setTitle('title2');
        $recipe2->setNbPortion(1);
        $recipe2->setType('pièces cocktail');
        $recipe2->setDifficulty('moyen');
        $recipe2->setTime(115);
        $manager->persist($recipe2);
        $this->addReference(self::RECIPE_REFERENCE2, $recipe);

        $recipe3 = new Recipe();
        $recipe3->setTitle('title3');
        $recipe3->setNbPortion(1);
        $recipe3->setType('plat principal');
        $recipe3->setDifficulty('moyen');
        $recipe3->setTime(76);
        $manager->persist($recipe3);
        $this->addReference(self::RECIPE_REFERENCE3, $recipe);

        $recipe4 = new Recipe();
        $recipe4->setTitle('title4');
        $recipe4->setNbPortion(1);
        $recipe4->setType('dessert');
        $recipe4->setDifficulty('Facile');
        $recipe4->setTime(90);
        $manager->persist($recipe4);
        $this->addReference(self::RECIPE_REFERENCE4, $recipe);

        $manager->flush();
    }
}
