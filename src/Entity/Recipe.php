<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
#[UniqueEntity('title')]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 60)]
    private $slug;

    #[ORM\Column(type: 'string', length: 60)]
    private $title;

    #[ORM\Column(type: 'integer')]
    private $nb_portion;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Image::class , cascade: [ "persist" ])]
    private $images;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: RecipeIngredient::class, cascade: [ "persist" ])]
    private $ingredients;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: RecipeStep::class, cascade: [ "persist" ])]
    private $recipeSteps;

    #[ORM\Column(type: 'string', columnDefinition:"ENUM('entrée', 'pièces cocktail', 'plat principal', 'dessert')", length: 255)]
    private $type;

    #[ORM\Column(type: 'string', length: 45, columnDefinition:"ENUM('facile', 'moyen', 'difficile')")]
    private $difficulty;

    #[ORM\Column(type: 'integer', length: 60)]
    private $time;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->ingredients = new ArrayCollection();
        $this->recipeSteps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNbPortion(): ?int
    {
        return $this->nb_portion;
    }

    public function setNbPortion(int $nb_portion): self
    {
        $this->nb_portion = $nb_portion;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRecipe($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRecipe() === $this) {
                $image->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RecipeIngredient>
     */
    public function getIngredients(): Collection
    {
        return $this->ingredients;
    }

    public function addIngredient(RecipeIngredient $recipeIngredient): self
    {
        if (!$this->ingredients->contains($recipeIngredient)) {
            $this->ingredients[] = $recipeIngredient;
            $recipeIngredient->setRecipe($this);
        }

        return $this;
    }

    public function removeIngredient(RecipeIngredient $recipeIngredient): self
    {
        if ($this->ingredients->removeElement($recipeIngredient)) {
            // set the owning side to null (unless already changed)
            if ($recipeIngredient->getRecipe() === $this) {
                $recipeIngredient->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, RecipeStep>
     */
    public function getRecipeSteps(): Collection
    {
        return $this->recipeSteps;
    }

    public function addRecipeStep(RecipeStep $recipeStep): self
    {
        if (!$this->recipeSteps->contains($recipeStep)) {
            $this->recipeSteps[] = $recipeStep;
            $recipeStep->setRecipe($this);
        }

        return $this;
    }

    public function removeRecipeStep(RecipeStep $recipeStep): self
    {
        if ($this->recipeSteps->removeElement($recipeStep)) {
            // set the owning side to null (unless already changed)
            if ($recipeStep->getRecipe() === $this) {
                $recipeStep->setRecipe(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;
        // NO newline at end of file
        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
