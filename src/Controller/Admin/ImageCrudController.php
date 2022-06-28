<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }


    public function configureFields(string $image): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('recipe'),
            ImageField::new('image')
                ->setBasePath('upload/images/')
                ->setUploadDir('public/build/images/'),
            IntegerField::new('position'),
        ];
    }
    
}
