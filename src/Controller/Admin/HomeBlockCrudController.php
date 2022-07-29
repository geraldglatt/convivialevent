<?php

namespace App\Controller\Admin;

use App\Entity\HomeBlock;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
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
            ->setDateTimeFormat(dateFormatOrPattern:DateTimeField::FORMAT_LONG)
            ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }

    public function configureFields(string $homeBlock): iterable
    {
        return [
            yield TextField::new('title', label: 'titre'),
            yield ImageField::new('image')
                ->setBasePath('images/')
                ->setUploadDir('public/images/convivialevent_images'),
            yield TextEditorField::new('content' , label: 'contenu'),
            yield DateTimeField::new('updatedAt', label: 'Modifié le'),
            yield IntegerField::new('position'),
            yield AssociationField::new('page')
                ->setCrudController(pageCrudController::class),
        ];
    }
}
