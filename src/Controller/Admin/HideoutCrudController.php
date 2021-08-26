<?php

namespace App\Controller\Admin;

use App\Entity\Hideout;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HideoutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hideout::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('address'),
            CountryField::new('country'),
            TextField::new('type'),
            IdField::new('hideout_code'),
            AssociationField::new('mission'),
        ];
    }
}
