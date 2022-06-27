<?php

namespace App\DataFixtures;

use App\Entity\HomeBlock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HomeBlockFixtures extends Fixture implements DependentFixtureInterface 
{ 
    public function load(ObjectManager $manager): void
    { 
        $homeBlock1 = new HomeBlock();
        $homeBlock1->setTitle('Mariage champêtre');
        $homeBlock1->setImage('image');
        $homeBlock1->setContent('content');
        $homeBlock1->setPosition(1);

        /** @var \App\Entity\Page */
        $page = $this->getReference(PageFixtures::PAGE_REFERENCE1);
        $homeBlock1->setPage($page);
        $manager->persist($homeBlock1);

        $homeBlock2 = new HomeBlock();
        $homeBlock2->setTitle('Mariage Tradition & Prestige');
        $homeBlock2->setImage('image');
        $homeBlock2->setContent('content');
        $homeBlock2->setPosition(2);

        /** @var \App\Entity\Page */
        $page = $this->getReference(PageFixtures::PAGE_REFERENCE2);
        $homeBlock2->setPage($page);
        $manager->persist($homeBlock2);

        $homeBlock3 = new HomeBlock();
        $homeBlock3->setTitle('BBQ & Cochon');
        $homeBlock3->setImage('image');
        $homeBlock3->setContent('content');
        $homeBlock3->setPosition(3);

        /** @var \App\Entity\Page */
        $page = $this->getReference(PageFixtures::PAGE_REFERENCE3);
        $homeBlock3->setPage($page);
        $manager->persist($homeBlock3);

        $homeBlock4 = new HomeBlock();
        $homeBlock4->setTitle('Entreprise');
        $homeBlock4->setImage('image');
        $homeBlock4->setContent('content');
        $homeBlock4->setPosition(4);

        /** @var \App\Entity\Page */
        $page = $this->getReference(PageFixtures::PAGE_REFERENCE4);
        $homeBlock4->setPage($page);
        $manager->persist($homeBlock4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PageFixtures::class,
        ];
    }
}
