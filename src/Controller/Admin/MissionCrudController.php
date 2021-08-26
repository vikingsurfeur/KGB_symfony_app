<?php

namespace App\Controller\Admin;

use App\Entity\Mission;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MissionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mission::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            IdField::new('mission_code'),
            CountryField::new('country'),
            TextField::new('type'),
            TextField::new('status'),
            TextField::new('skill_requirement'),
            TextField::new('description')->onlyOnForms(),
            AssociationField::new('agents')->hideOnForm(),
            AssociationField::new('targets')->hideOnForm(),
            AssociationField::new('contacts')->hideOnForm(),
            AssociationField::new('hideouts')->hideOnForm(),
            DateTimeField::new('start_date'),
            DateTimeField::new('end_date'),
        ];
    }
}
