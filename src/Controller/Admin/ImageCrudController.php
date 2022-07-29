<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            yield IdField::new('id')->hideOnForm(),
            yield TextField::new('imageFile')->setFormType(VichImageType::class),
            yield ImageField::new('image')
                ->setBasePath('images/')
                ->setUploadDir('public/images/convivialevent_images'),
            yield DateTimeField::new('updatedAt', label: 'Modifié le'),
            yield AssociationField::new('recipe', label: 'recette')
            ->setCrudController(recipeCrudController::class),
            yield IntegerField::new('position')->hideOnForm(),
        ];
    }
}
