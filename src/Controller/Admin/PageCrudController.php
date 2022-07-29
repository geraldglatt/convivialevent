<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Form\ImagesType;
use App\Form\PagePdfType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
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
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
            ->setDateTimeFormat(dateFormatOrPattern:DateTimeField::FORMAT_LONG)
            ->setEntityLabelInPlural(label:'Page à configurer avant homeBlock');
    }

    public function configureFields(string $page): iterable
    {
        yield FormField::addTab('Général');
        yield IdField::new('id')
            ->hideOnForm()
            ->hideOnIndex();
        yield TextField::new('title' , label: 'titre');
        yield TextEditorField::new('content' , label: 'contenu');
        yield TextEditorField::new('meta_desc', label: 'contenu internet');
        yield DateTimeField::new('updatedAt', label: 'modifié le ');
        yield ImageField::new('image')
            ->setBasePath('images/')
            ->setUploadDir('public/images/convivialevent_images');

        yield FormField::addTab('Pagepdfs');
        yield CollectionField::new('pagePdfs', label:'pdf')
                    ->setEntryType(PagePdfType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();

        yield FormField::addTab('Images');
        yield CollectionField::new('pageImages', label: 'images')
                    ->setEntryType(ImagesType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();
    }
}
