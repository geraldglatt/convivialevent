<?php

namespace App\Controller\Admin;

use App\Entity\RecipeStep;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RecipeStepCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RecipeStep::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            yield IdField::new('id')->hideOnForm(),
            yield AssociationField::new('recipe')
                ->setCrudController(crudControllerFqcn:recipeCrudController::class),
            yield TextField::new('title'),
            yield TextEditorField::new('content', label:'contenu'),
            yield IntegerField::new('position'),
        ];
    }
}
