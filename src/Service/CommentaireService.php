<?php

namespace App\Service;

use App\entity\Commentaire;
use App\entity\Recipe;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;

class CommentaireService
{
    private $manager;

    public function __construct(
        EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function persistCommentaire(
        Commentaire $commentaire,
        Recipe $recette = null,
    ):void {
        $commentaire->setIsPublished(false)
                    ->setrecette($recette)
                    ->setCreatedAt(new DateTimeImmutable('now'));

        $this->manager->persist($commentaire);
        $this->manager->flush();
    }
}