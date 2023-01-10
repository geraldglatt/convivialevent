<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    public function configureFields(string $images): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('imageFile')
            ->setFormType(VichImageType::class)
            ->onlyWhenCreating(),
            ImageField::new('file')
                ->setBasePath('/uploads/imagesPage/')->onlyOnIndex()
                ->setUploadDir('assets/images/'),
            IntegerField::new('position'),
            AssociationField::new('page')
        ];
    }
}
