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
    public const RECIPE_REFERENCE5 = 'RECIPE_REFERENCE5';
    public const RECIPE_REFERENCE6 = 'RECIPE_REFERENCE6';
    public const RECIPE_REFERENCE7 = 'RECIPE_REFERENCE7';
    public const RECIPE_REFERENCE8 = 'RECIPE_REFERENCE8';
    public const RECIPE_REFERENCE9 = 'RECIPE_REFERENCE9';
    public const RECIPE_REFERENCE10 = 'RECIPE_REFERENCE10';
    public const RECIPE_REFERENCE11 = 'RECIPE_REFERENCE11';
    public const RECIPE_REFERENCE12 = 'RECIPE_REFERENCE12';

    public function load(ObjectManager $manager): void
    {
        $recipe = new Recipe();
        $recipe->setTitle('title1')
               ->setNbPortion(1)
               ->setType('entrée')
               ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
               ->setFile('saumon-laque.webp')
               ->setDifficulty('facile')
               ->setTime(45);
        $manager->persist($recipe);
        $this->addReference(self::RECIPE_REFERENCE1, $recipe);

        $recipe2 = new Recipe();
        $recipe2->setTitle('title2')
               ->setNbPortion(4)
               ->setType('pièces cocktail')
               ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
               ->setFile('saumon-laque.webp')
               ->setDifficulty('difficile')
               ->setTime(115);
        $manager->persist($recipe2);
        $this->addReference(self::RECIPE_REFERENCE2, $recipe2);

        $recipe3 = new Recipe();
        $recipe3->setTitle('title3')
                ->setNbPortion(1)
                ->setType('plat principal')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('moyen')
                ->setTime(76);
        $manager->persist($recipe3);
        $this->addReference(self::RECIPE_REFERENCE3, $recipe3);

        $recipe4 = new Recipe();
        $recipe4->setTitle('title4')
                ->setNbPortion(1)
                ->setType('dessert')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('Facile')
                ->setTime(90);
        $manager->persist($recipe4);
        $this->addReference(self::RECIPE_REFERENCE4, $recipe4);

        $recipe5 = new Recipe();
        $recipe5->setTitle('title5')
                ->setNbPortion(4)
                ->setType('entrée')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('difficile')
                ->setTime(60);
        $manager->persist($recipe5);
        $this->addReference(self::RECIPE_REFERENCE5, $recipe5);

        $recipe6 = new Recipe();
        $recipe6->setTitle('title6')
                ->setNbPortion(1)
                ->setType('plat principal')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('moyen')
                ->setTime(115);
        $manager->persist($recipe6);
        $this->addReference(self::RECIPE_REFERENCE6, $recipe6);

        $recipe7 = new Recipe();
        $recipe7->setTitle('title7')
                ->setNbPortion(1)
                ->setType('pièces cocktail')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('Facile')
                ->setTime(90);
        $manager->persist($recipe7);
        $this->addReference(self::RECIPE_REFERENCE7, $recipe7);

        $recipe8 = new Recipe();
        $recipe8->setTitle('title8')
                ->setNbPortion(1)
                ->setType('dessert')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('Facile')
                ->setTime(90);
        $manager->persist($recipe8);
        $this->addReference(self::RECIPE_REFERENCE8, $recipe8);

        $recipe9 = new Recipe();
        $recipe9->setTitle('title4')
                ->setNbPortion(1)
                ->setType('plat principal')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('Facile')
                ->setTime(80);
        $manager->persist($recipe9);
        $this->addReference(self::RECIPE_REFERENCE9, $recipe9);

        $recipe10 = new Recipe();
        $recipe10->setTitle('title10')
                ->setNbPortion(1)
                ->setType('dessert')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('Facile')
                ->setTime(90);
        $manager->persist($recipe10);
        $this->addReference(self::RECIPE_REFERENCE10, $recipe10);

        $recipe11 = new Recipe();
        $recipe11->setTitle('title11')
                ->setNbPortion(1)
                ->setType('dessert')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('moyen')
                ->setTime(50);
        $manager->persist($recipe11);
        $this->addReference(self::RECIPE_REFERENCE11, $recipe11);

        $recipe12 = new Recipe();
        $recipe12->setTitle('title12')
                ->setNbPortion(4)
                ->setType('dessert')
                ->setState(mt_rand(0,2) === 1 ? Recipe::STATES[0] : Recipe::STATES[1])
                ->setFile('saumon-laque.webp')
                ->setDifficulty('difficile')
                ->setTime(90);
        $manager->persist($recipe12);
        $this->addReference(self::RECIPE_REFERENCE12, $recipe12);

        $manager->flush();
    }
}
