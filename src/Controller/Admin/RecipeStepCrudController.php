<?php

namespace App\Controller\Admin;

use App\Entity\RecipeStep;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RecipeStepCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RecipeStep::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
