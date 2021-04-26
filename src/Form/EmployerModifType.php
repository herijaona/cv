<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EmployerModifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Avatar"
            ])
            ->add('Nom', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Prenom', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('DateDeNaissance', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'class' => "form-control"
                ]
            ])

            ->add('Telephone', TelType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Sexe', ChoiceType::class, [
                'choices'  => [
                    'selectionner' => null,
                    'Feminin' => 'Feminin',
                    'Masculin' => 'Masculin',
                    'autre' => 'autre',
                ],
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Adresse', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Apropos', TextareaType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
