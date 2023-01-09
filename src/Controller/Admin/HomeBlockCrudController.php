<?php

namespace App\Controller\Admin;

use App\Entity\HomeBlock;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Form\Type\VichImageType;

class HomeBlockCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return HomeBlock::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $homeBlock): iterable
    {
        return [
            TextField::new('title')
                ->setFormType(CKEditorType::class),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyWhenCreating(),
            ImageField::new('file')
                ->setBasePath('/uploads/imagesHomeblock/')
                ->setUploadDir('assets/images/'),
            TextEditorField::new('content')
                ->setFormType(CKEditorType::class),
            IntegerField::new('position'),
            AssociationField::new('page'),
        ];
    }
}
