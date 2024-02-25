<?php

namespace App\Controller\Admin;

use App\Entity\PagePdf;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class PagePdfCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PagePdf::class;
    }

    public function configureFields(string $pagePdf): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('pdfsFile')
            ->setFormType(VichImageType::class)
            ->onlyOnForms(),
            ImageField::new('file')
                ->setBasePath('/uploads/pdfsPage/')->onlyOnIndex()
                ->setUploadDir('assets/pdfs/'),
            IntegerField::new('position'),
            AssociationField::new('page')
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Pdf')
            ->setPageTitle('edit', 'Modifier le pdf');
    }
}
