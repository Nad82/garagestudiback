<?php

namespace App\Controller\Admin;

use App\Entity\FormulaireV;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Controller\Admin\Trait\ReadAndDeleteTrait;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class FormulaireVCrudController extends AbstractCrudController
{
    use ReadAndDeleteTrait;

    public static function getEntityFqcn(): string
    {
        return FormulaireV::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Formulaires de contact des véhicules')
            ->setEntityLabelInSingular('Formulaire de contact des véhicules')
            ->setPageTitle('index', 'Garage V. Parrot - Liste des %entity_label_plural%')
            ->setPageTitle('detail', 'Garage V. Parrot - un %entity_label_singular%')
            ->setEntityPermission('ROLE_USER');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom'),
            TextField::new('prenom'),
            EmailField::new('email'),
            TelephoneField::new('telephone'),
            TextField::new('message'),
            AssociationField::new('vehicule'),
        ];
    }
}
