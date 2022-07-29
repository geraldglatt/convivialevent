<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use App\Form\PageType;
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
            yield IdField::new(propertyName:'id')->hideOnForm(),
            yield AssociationField::new('page')
                ->setCrudController(PageType::class),
            yield TextField::new('title', label: 'titre'),
            yield TextField::new('imageFile')->setFormType(VichImageType::class),
            yield ImageField::new('image')
                ->setBasePath('images/')
                ->setUploadDir('public/images/convivialevent_images'),
            yield IntegerField::new('position'),
        ];
    }
}
