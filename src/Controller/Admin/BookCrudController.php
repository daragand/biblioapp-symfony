<?php

namespace App\Controller\Admin;

use App\Entity\Book;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

class BookCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Book::class;
    }

    //le 
    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
        ->add(Crud::PAGE_INDEX,Action::DETAIL)
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('titre du livre')
                ->setIcon('fas fa-book')
                ->setHelp('saisissez le titre du livre'),
                TextField::new('title', 'titre du livre'),

            SlugField::new('slug')
            ->setTargetFieldName('title')
            ->hideOnIndex(),
        
                

            FormField::addPanel('année du livre')
            ->setIcon('fas fa-calendar')
            ->setHelp('saisissez l\'année du livre'),
            TextField::new('year','année du livre'),
            
            
            FormField::addPanel('ISBN du livre')
            ->setIcon('fas fa-barcode')
            ->setHelp('saisissez l\'ISBN du livre'),
            TextField::new('isbn','isbn du livre'),


            FormField::addPanel('Prix du livre')
            ->setIcon('fas fa-calendar')
            ->setHelp('saisissez le prix du livre'),
            NumberField::new('price','Prix du livre'),


            FormField::addPanel('Nombre de pages du livre')
            ->setIcon('fas fa-book-open')
            ->setHelp('saisissez le nombre de pages du livre'),
            NumberField::new('pages','nb de pages du livre'),

            FormField::addPanel('résumé du livre')
            ->setIcon('fas fa-book-open')
            ->setHelp('saisissez le résumé'),
            TextEditorField::new('description','résumé du livre'),

            FormField::addPanel('résumé du livre')
            ->setIcon('fas fa-image')
            ->setHelp('Ajoutez une image de couverture au livre'),
            ImageField::new('cover','résumé du livre')
            ->setBasePath(('uploads/images'))
            ->setUploadDir(('public/uploads/images'))
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
            ,


            FormField::addPanel('Le livre est-il disponible ?')
            ->setIcon('fas fa-book-open')
            ->setHelp('cochez pour définir le livre comme disponible'),
            BooleanField::new('is_available','disponibilité du livre'),

            IdField::new('id')
            ->hideOnForm(),
            
        ];
    }

}
