<?php

namespace App\Controller\Admin;

use App\Entity\PagePdf;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PagePdfCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PagePdf::class;
    }

    public function configureFields(string $pagePdf): iterable
    {
        return [
            yield IdField::new('id')->hideOnForm(),
            yield AssociationField::new('page'),
            yield TextField::new('title', label: 'titre'),
        ];
    }
}
