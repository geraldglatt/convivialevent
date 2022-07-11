<?php

namespace App\DataFixtures;

use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PageFixtures extends Fixture
{
    public const PAGE_REFERENCE1 = 'PAGE_REFERENCE1';
    public const PAGE_REFERENCE2 = 'PAGE_REFERENCE2';
    public const PAGE_REFERENCE3 = 'PAGE_REFERENCE3';
    public const PAGE_REFERENCE4 = 'PAGE_REFERENCE4';

    public function load(ObjectManager $manager): void
    {
        $page1 = new Page();
        $page1->setTitle('Mariage Champêtre');
        $page1->setContent('Lorem Ipsum is simply dummy text of the printing and
        typesetting industry. Lorem Ipsum has been the industry\'s
        standard dummy text ever since the 1500s, when an unknown
        printer took a galley of type and scrambled it to make a type specimen book.');
        $page1->setMetaDesc('Mariage Champêtre');
        $manager->persist($page1);
        $this->addReference(self::PAGE_REFERENCE1, $page1);

        $page2 = new Page();
        $page2->setTitle('Mariage Tradition & Prestige');
        $page2->setContent('Lorem Ipsum is simply dummy text of the printing and
        typesetting industry. Lorem Ipsum has been the industry\'s
        standard dummy text ever since the 1500s, when an unknown
        printer took a galley of type and scrambled it to make a type specimen book.');
        $page2->setMetaDesc('Mariage Tradition & Prestige');
        $manager->persist($page2);
        $this->addReference(self::PAGE_REFERENCE2, $page2);

        $page3 = new Page();
        $page3->setTitle('BBQ & Cochon');
        $page3->setContent('Lorem Ipsum is simply dummy text of the printing and
        typesetting industry. Lorem Ipsum has been the industry\'s
        standard dummy text ever since the 1500s, when an unknown
        printer took a galley of type and scrambled it to make a type specimen book.');
        $page3->setMetaDesc('BBQ & Cochon');
        $manager->persist($page3);
        $this->addReference(self::PAGE_REFERENCE3, $page3);

        $page4 = new Page();
        $page4->setTitle('Entreprise');
        $page4->setContent('Lorem Ipsum is simply dummy text of the printing and
        typesetting industry. Lorem Ipsum has been the industry\'s
        standard dummy text ever since the 1500s, when an unknown
        printer took a galley of type and scrambled it to make a type specimen book.');
        $page4->setMetaDesc('Entreprise');
        $manager->persist($page4);
        $this->addReference(self::PAGE_REFERENCE4, $page4);

        $manager->flush();
    }
}
