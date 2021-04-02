<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CurriculumVitaeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Profile', TextType::class)
            ->add(
                $builder->create('Experience', FormType::class)
                    ->add('titre', TextType::class)
                    ->add('societe', TextType::class)
                    ->add('dateDebut', DateType::class)
                    ->add('dateFin', DateType::class)
                    ->add('diplomeObtenu', TextType::class)
                    ->add('ajouterexp', SubmitType::class)
            )
            ->add('sauvegarder', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
