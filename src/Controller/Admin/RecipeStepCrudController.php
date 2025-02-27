<?php

namespace App\Controller\Admin;

use App\Entity\RecipeStep;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
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
            TextField::new('title'),
            TextareaField::new('content'),
            IntegerField::new('position'),
            AssociationField::new('recipe')
        ];
    }
}
