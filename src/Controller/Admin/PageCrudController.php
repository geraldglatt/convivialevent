<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureFields(string $page): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('slug'),
            TextField::new('title'),
            TextEditorField::new('content'),
            TextEditorField::new('meta_desc'),
            ImageField::new('image')
                ->setBasePath('upload/images/')
                ->setUploadDir('public/build/images/'),
        ];
    }
}
