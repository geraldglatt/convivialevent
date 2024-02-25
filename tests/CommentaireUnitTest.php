<?php

namespace App\Tests;

use App\Entity\Commentaire;
use App\Entity\Recipe;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class CommentaireUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $commentaire = new Commentaire();
        $dateTime = new DateTimeImmutable();
        $recette = new Recipe();

        $commentaire->setAuteur('auteur')
                    ->setEmail('email@test.fr')
                    ->setContenu('contenu')
                    ->setCreatedAt($dateTime)
                    ->setRecette($recette);

        $this->assertTrue($commentaire->getAuteur() === 'auteur');
        $this->assertTrue($commentaire->getEmail() === 'email@test.fr');
        $this->assertTrue($commentaire->getContenu() === 'contenu');
        $this->assertTrue($commentaire->getCreatedAt() === $dateTime);
        $this->assertTrue($commentaire->getRecette() === $recette);
    }

    public function testIsFalse()
    {
        $commentaire = new Commentaire();
        $dateTime = new DateTimeImmutable();
        $recette = new Recipe();

        $commentaire->setAuteur('auteur')
                    ->setEmail('email@test.fr')
                    ->setContenu('contenu')
                    ->setCreatedAt($dateTime)
                    ->setRecette($recette);

        $this->assertFalse($commentaire->getAuteur() === 'false');
        $this->assertFalse($commentaire->getEmail() === 'false@test.fr');
        $this->assertFalse($commentaire->getContenu() === 'false');
        $this->assertFalse($commentaire->getCreatedAt() === new DateTimeImmutable());
        $this->assertFalse($commentaire->getRecette() === new Recipe);
    }

    public function testIsEmpty()
    {
        $commentaire = new Commentaire();

        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getEmail());
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getCreatedAt());
        $this->assertEmpty($commentaire->getRecette());
    }
}
