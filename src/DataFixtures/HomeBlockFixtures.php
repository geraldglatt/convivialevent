<?php

namespace App\DataFixtures;

use App\Entity\HomeBlock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomleBlockFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       for($i =0;$i<10;$i++)
       {
           $homeBlock = new HomeBlock();
           $homeBlock->setTitle('title'.$i);
           $homeBlock->setImage('image'.$i);
           $homeBlock->setLink('link'.$i);
           $homeBlock->setContent('content'.$i);
           $manager->persist($homeBlock);

       }

        $manager->flush();
    }
}
