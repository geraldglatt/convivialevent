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
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Vich\UploaderBundle\Form\Type\VichImageType;

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

        yield TextField::new('title')
            ->setFormType(CKEditorType::class);

        yield TextEditorField::new('content')
            ->setFormType(CKEditorType::class);

        yield TextEditorField::new('meta_desc')
        ->setFormType(CKEditorType::class);

        yield TextField::new('imageFile')->setFormType(VichImageType::class);

        yield ImageField::new('file')
            ->setBasePath('/uploads/imagesPage/')->onlyOnIndex();

        yield AssociationField::new('pageImages');

        yield FormField::addTab('Pagepdfs');
        yield CollectionField::new('pagePdfs')
                    ->setEntryType(PagePdfType::class)
                    ->setEntryIsComplex(true)
                    ->hideOnIndex();

        
            
    }
}
