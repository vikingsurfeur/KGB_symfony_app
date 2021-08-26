<?php

namespace App\Controller\Admin;

use App\Entity\Target;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TargetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Target::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastName'),
            TextField::new('firstName'),
            DateTimeField::new('dateOfBirth'),
            IdField::new('target_code'),
            CountryField::new('nationality'),
            AssociationField::new('mission'),
        ];
    }
}
