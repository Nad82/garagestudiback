<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\ReadAndEditTrait as TraitReadAndEditTrait;
use App\Entity\Horaires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;



class HorairesCrudController extends AbstractCrudController
{
    use TraitReadAndEditTrait;

    public static function getEntityFqcn(): string
    {
        return Horaires::class;
    }

    public function configureCrud(Crud $crud): crud
    {
        return $crud
            ->setEntityLabelInPlural('Garage V. Parrot - Horaires')
            ->setEntityLabelInSingular('Garage V. Parrot - Horaires')
            ->setPageTitle('index', 'Garage V.Parrot - Horaires')
            ->setPageTitle('detail', 'Garage V.Parrot - Horaires')
            ->setEntityPermission('ROLE_ADMIN');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('lundi'),
            TextEditorField::new('mardi'),
            TextEditorField::new('mercredi'),
            TextEditorField::new('jeudi'),
            TextEditorField::new('vendredi'),
            TextEditorField::new('samedi'),
            TextEditorField::new('dimanche'),
        ];
    }
}
