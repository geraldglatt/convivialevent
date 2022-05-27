<?php

namespace App\DataFixtures;

use App\Entity\PagePdf;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0;$i < 10;$i++)
        {
            $pagePdf = new PagePdf();
            $pagePdf->setTitle('title'.$i);
            $manager->persist($pagePdf);
        }

        $manager->flush();
    }
}
