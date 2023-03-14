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
            for ($i = 0; $i < 1; ++$i) {
                $pagePdf = new PagePdf();
                $pagePdf->setTitle('options conviviales'.$i);
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
