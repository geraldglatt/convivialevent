<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Entity\PagePdf;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class PagePdfCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PagePdf::class;
    }


    public function configureFields(string $pagePdf): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('page'),
            TextField::new('title'),
        ];
    }
    
}
