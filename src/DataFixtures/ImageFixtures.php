<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0;$i <10;$i++)
        {
            $image = new Image();
            $image->setImage('image'.$i);
            $image->setPosition('position'.$i);
            $manager->persist($image);
        }

        $manager->flush();
    }
}
