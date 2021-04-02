<?php

namespace App\Form;

use App\Entity\Candidate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CandidateModifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Avatar"
            ])

            ->add('poste', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
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
            ->add('Telephone', TelType::class, [
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
            ->add('sexe', ChoiceType::class, [
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
            ->add('Niveau', ChoiceType::class, [
                'choices'  => [
                    'Niveau' => null,
                    'Junior' => "Junior",
                    'Manager' => "Manager",
                    'Senior' => "Senior",
                ],
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Apropos', TextareaType::class, [
                "label" => "A Propos",
                'attr' => [
                    'class' => "form-control"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
