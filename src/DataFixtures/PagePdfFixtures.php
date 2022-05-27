<?php

namespace App\DataFixtures;

use App\Entity\PagePdf;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PagePdfFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach([PageFixtures::PAGE_REFERENCE1,PageFixtures::PAGE_REFERENCE2] as $ref){
            for($i = 0;$i < 10;$i++)
            {
                $pagePdf = new PagePdf();
                $pagePdf->setTitle('title'.$i);
                $pagePdf->setPage($this->getReference($ref));
                $manager->persist($pagePdf);
            }
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            PageFixtures::class,
        ];
    }
}
