<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchMissionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('words', SearchType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'Rechercher une mission',
                    'class' => 'd-flex justify-content-center p-0',
                ],
            ])
            ->add('Search', SubmitType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'btn btn-outline-success',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
