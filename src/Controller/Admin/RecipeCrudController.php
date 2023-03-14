<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use App\Form\IngredientType;
use App\Form\StepType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

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
        yield FormField::addTab('Recettes');
        yield TextField::new('title');
        yield IntegerField::new('nb_portion');
        yield ChoiceField::new('type')->setChoices([
            'entrée' => 'entrée',
            'pièces cocktail' => 'pièces cocktail',
            'plat principal' => 'plat principal',
            'dessert' => 'dessert',
        ]);
        yield ChoiceField::new('difficulty')->setChoices([
            'facile' => 'facile',
            'moyen' => 'moyen',
            'difficile' => 'difficile',
        ]);
        yield IntegerField::new('time');

        yield TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnForms();
        yield ImageField::new('file')
                ->setBasePath('/uploads/imagesRecipe/')
                ->setUploadDir('assets/images/')
                ->onlyOnIndex();

        yield FormField::addTab('Ingrédients');
        yield CollectionField::new('ingredients')
                    ->setEntryType(IngredientType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();

        yield FormField::addTab('Étapes');
        yield CollectionField::new('recipeSteps')
                    ->setEntryType(StepType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();

        yield FormField::addTab('Image');
        yield TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->hideOnIndex();
        yield ImageField::new('file')
                ->setBasePath('/uploads/imagesRecipe/')
                ->setUploadDir('assets/images/')
                ->hideOnForm();
    }
}
