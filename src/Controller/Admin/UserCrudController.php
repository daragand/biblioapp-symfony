<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

  
    public function configureFields(string $pageName): iterable
    {
        //cela permet de définir les infos dispos sur le dashbord crud et dans quelle feuille
        return [
            // FormField::addTab('Information du compte'),
            IdField::new('id')
            ->hideOnForm(),
            //hide on form, masque le champ
            FormField::addPanel('tot du compte')
                ->setIcon('fas fa-user')
                    ->setHelp('cette section contient les informations du compte de l\'utilisateur'),
            TextField::new('email'),
            // TextEditorField::new('description'),
        ];
    }
   
}
