<?php

namespace App\Entity;

use App\Repository\RecipeIngredientRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;


#[ORM\Entity(repositoryClass: RecipeIngredientRepository::class)]
class RecipeIngredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $name;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'string', length: 120)]
    private $quantity_name;

    #[ORM\ManyToMany(targetEntity: Recipe::class, inversedBy: 'ingredients', cascade: [ "persist" ])]
    #[JoinTable('recipe_ingredient_recipe')]
    private $recipe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getQuantityName(): ?string
    {
        return $this->quantity_name;
    }

    public function setQuantityName(string $quantity_name): self
    {
        $this->quantity_name = $quantity_name;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): self
    {
        $this->recipe = $recipe;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName(). ' - '.$this->getQuantity().$this->getQuantityName();
    }
}
