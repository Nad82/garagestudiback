<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\ReadAndEditTrait as TraitReadAndEditTrait;
use App\Entity\Services;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class ServicesCrudController extends AbstractCrudController
{
    use TraitReadAndEditTrait;

    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    public function configureCrud(Crud $crud): crud
    {
        return $crud
            ->setEntityLabelInPlural('Garage V. Parrot - Services')
            ->setEntityLabelInSingular('Garage V. Parrot - Services')
            ->setPageTitle('index', 'Garage V.Parrot - Services')
            ->setPageTitle('detail', 'Garage V.Parrot - Services')
            ->setEntityPermission('ROLE_ADMIN');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('description'),
        ];
    }
}
