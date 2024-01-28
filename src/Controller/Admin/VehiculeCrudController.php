<?php

namespace App\Controller\Admin;

use App\Entity\Vehicule;
use App\Form\VehiculeImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class VehiculeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vehicule::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Garage V. Parrot - Véhicules')
            ->setEntityLabelInSingular('Garage V. Parrot - Véhicule')
            ->setPageTitle('index', 'Garage V.Parrot - Liste des véhicules')
            ->setPageTitle('detail', 'Garage V.Parrot - Véhicule')
            ->setEntityPermission('ROLE_USER');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            CollectionField::new('imageFiles')
                ->setEntryType(VehiculeImageType::class),
            MoneyField::new('prix')->setCurrency('EUR'),
            IntegerField::new('kilometrage'),
            IntegerField::new('annee'),
            TextField::new('equipements'),
        ];
    }
}
