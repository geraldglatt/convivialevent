<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        foreach ([PageFixtures::PAGE_REFERENCE1, PageFixtures::PAGE_REFERENCE2, PageFixtures::PAGE_REFERENCE3, PageFixtures::PAGE_REFERENCE4] as $ref) {
            for ($i = 0; $i < 1; ++$i) {
                $image = new Images();
                $image->setFile('champêtre-2.webp');
                $image->setTitle('title'.$i);
                $image->setPosition($i);
                $image->setUpdatedAt(new \DateTimeImmutable('now'));

                /** @var \App\Entity\Page */
                $page = $this->getReference($ref);
                $image->setPage($page);

                $manager->persist($image);
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
