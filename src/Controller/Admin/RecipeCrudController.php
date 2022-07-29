<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use App\Form\StepType;
use App\Form\ImageType;
use App\Form\IngredientType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipe::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setNumberFormat('%.2d')
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $recipe): iterable
    {
        yield FormField::addTab('Général');
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('title' , label: 'titre');
        yield IntegerField::new('nb_portion' , label: 'nombre de portions');
        yield ChoiceField::new('type')->setChoices([
            'entrée' => "entrée",
            'pièces cocktail' => "pièces cocktail",
            'plat principal' => "plat principal",
            'dessert' => "dessert",
        ]);
        yield ChoiceField::new('difficulty' , label: 'difficulté')->setChoices([
            "facile" => "facile",
            "moyen" => "moyen",
            "difficile" => "difficile"
        ]);
        yield IntegerField::new('time', label: 'temps de préparation');

        yield FormField::addTab('Ingrédients');
        yield CollectionField::new('ingredients')
                    ->setEntryType(IngredientType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();

        yield FormField::addTab('Etapes');
        yield CollectionField::new('recipeSteps' , label: 'étapes de la recette')
                    ->setEntryType(StepType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();

        yield FormField::addTab('Image');
        yield CollectionField::new('image')
                    ->setEntryType(ImageType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();
    }
}
