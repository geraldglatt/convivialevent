<?php

namespace App\DataFixtures;

use App\Entity\Page;
use App\Entity\PagePdf;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PageFixtures extends Fixture 
{
    public const PAGE_REFERENCE1 = 'RECIPE_REFERENCE1';
    public const PAGE_REFERENCE2 = 'RECIPE_REFERENCE2';
   
    public function load(ObjectManager $manager): void
    {
        $page = new Page();
        $page->setSlug('recipe1');
        $page->setTitle('title1');
        $page->setContent('content1');
        $manager->persist($page);
        $this->addReference(self::PAGE_REFERENCE1, $page);

        $page = new PAGE();
        $page->setSlug('recipe2');
        $page->setTitle('title2');
        $page->setContent('content2');
        $manager->persist($page);
        $this->addReference(self::PAGE_REFERENCE2, $page);
        
        $manager->flush();
    }

    
}