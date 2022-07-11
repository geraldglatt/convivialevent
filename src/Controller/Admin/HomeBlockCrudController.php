<?php

namespace App\Controller\Admin;

use Vich\Uploadable;
use App\Entity\HomeBlock;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
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

    public function configureFields(string $homeBlock): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),
            AssociationField::new('page'),
            TextField::new('title'),
            ImageField::new('image')
                ->setBasePath('upload/images/')
                ->setUploadDir('public/build/images/'),
            TextEditorField::new('content'),
            IntegerField::new('position'),
        ];
    }
}
