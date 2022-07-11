<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Form\ImageType;
use App\Form\PagePdfType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $page): iterable
    {
        yield FormField::addTab('Général');
        yield IdField::new('id')
            ->hideOnForm()
            ->hideOnIndex();
        yield TextField::new('title');
        yield TextEditorField::new('content');
        yield TextEditorField::new('meta_desc');
        yield ImageField::new('image')
            ->setBasePath('upload/images/')
            ->setUploadDir('public/build/images/');

        yield FormField::addTab('Pagepdfs');
        yield CollectionField::new('pagePdfs')
                    ->setEntryType(PagePdfType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();

        yield FormField::addTab('Images');
        yield CollectionField::new('pageImages')
                    ->setEntryType(ImageType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();
    }
}
