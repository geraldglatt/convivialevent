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
            AssociationField::new('page'),
            TextField::new('title')
                ->setFormType(CKEditorType::class),
            ImageField::new('image')
                ->setBasePath('images/')
                ->setUploadDir('public/images/convivialevent_images'),
            TextEditorField::new('content')
                ->setFormType(CKEditorType::class),
            IntegerField::new('position'),
        ];
    }
}
