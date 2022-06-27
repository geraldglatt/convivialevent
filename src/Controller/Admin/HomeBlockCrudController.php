<?php

namespace App\Controller\Admin;

use App\Entity\HomeBlock;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HomeBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomeBlock::class;
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
