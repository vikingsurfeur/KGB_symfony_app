<?php

namespace App\Controller\Admin;

use App\Entity\Agent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AgentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Agent::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastName'),
            TextField::new('firstName'),
            DateTimeField::new('dateOfBirth'),
            IdField::new('agent_code'),
            CountryField::new('nationality'),
            AssociationField::new('mission'),
            AssociationField::new('skills')->hideOnForm(),
        ];
    }
}
