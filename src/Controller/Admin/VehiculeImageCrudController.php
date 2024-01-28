<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\ReadOnlyTrait;
use App\Entity\VehiculeImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class VehiculeImageCrudController extends AbstractCrudController
{
    use ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return VehiculeImage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular("Image d'un véhicule")
            ->setEntityLabelInPlural('Images des véhicules')
            ->setPageTitle('index', 'Garage V.Parrot - Liste des images des véhicules')
            ->setPageTitle('detail', 'Garage V.Parrot - Image d\'un véhicule')
            ->setEntityPermission('ROLE_USER');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            IntegerField::new('taille'),
            DateTimeField::new('UpdateAt')
                ->setDisabled(),
            AssociationField::new('vehicule'),

        ];
    }
}
