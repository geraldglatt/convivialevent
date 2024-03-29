<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach ([RecipeFixtures::RECIPE_REFERENCE1, RecipeFixtures::RECIPE_REFERENCE2] as $ref) {
            for ($i = 0; $i < 10; ++$i) {
                $image = new Image();
                $image->setImage('image'.$i);
                $image->setPosition($i);
                $image->setUpdatedAt(new \DateTimeImmutable('now'));

                /** @var \App\Entity\Recipe */
                $reciepe = $this->getReference($ref);
                $image->setRecipe($reciepe);
                $manager->persist($image);
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
