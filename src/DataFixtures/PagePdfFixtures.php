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
        foreach ([PageFixtures::PAGE_REFERENCE1, PageFixtures::PAGE_REFERENCE2, PageFixtures::PAGE_REFERENCE3, PageFixtures::PAGE_REFERENCE4] as $ref) {
            for ($i = 0; $i < 1; ++$i) {
                $pagePdf = new PagePdf();
                $pagePdf->setTitle('options conviviales'.$i);

                /** @var \App\Entity\Page */
                $page = $this->getReference($ref);
                $pagePdf->setPage($page);
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
