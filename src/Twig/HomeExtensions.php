<?php

namespace App\Twig;

use App\Entity\HomeBlock;
use Doctrine\ORM\EntityManagerInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HomeExtensions extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('home', [$this, 'getHome'])
        ];
    }

    public function getHome()
    {
        return $this->em->getRepository(HomeBlock::class)->findBy([], ['title' => 'ASC']);
    }
}

