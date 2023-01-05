<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Form\ImagesType;
use App\Form\PagePdfType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
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
            ->setEntityLabelInPlural(label:'Page à configurer avant homeBlock');
    }

    public function configureFields(string $page): iterable
    {
        yield FormField::addTab('Général');
        
        SlugField::new('slug')
            ->setTargetFieldName('nom')
            ->hideOnIndex();

        TextField::new('title')
            ->setFormType(CKEditorType::class);
        TextEditorField::new('content')
            ->setFormType(CKEditorType::class);
        TextEditorField::new('meta_desc')
        ->setFormType(CKEditorType::class);
        ImageField::new('image')
            ->setBasePath('images/')
            ->setUploadDir('public/images/convivialevent_images');

        // yield FormField::addTab('Pagepdfs');
        // CollectionField::new('pagePdfs')
        //             ->setEntryType(PagePdfType::class)
        //             ->setEntryIsComplex(true)
        //             ->hideOnIndex();

        // yield FormField::addTab('Images');
        // yield CollectionField::new('pageImages')
        //             ->setEntryType(ImagesType::class)
        //             ->setEntryIsComplex(true)
        //             ->hideOnIndex();
    }
}
