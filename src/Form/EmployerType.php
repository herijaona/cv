<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class EmployerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Veuillez entre votre Nom"
                ]
            ])
            ->add('prenom', TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Veuillez entre votre Prénom"
                ]
            ])
            ->add('nomsociete', TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Veuillez entre votre Nom de societe"
                ]
            ])
            ->add('email', EmailType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Veuillez entre votre Email"
                ]
            ])
            ->add("telephone", TelType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Veuillez entre votre numero de Telephone"
                ]
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'selectionner' => null,
                    'Feminin' => 'Feminin',
                    'Masculin' => 'Masculin',
                    'autre' => 'autre',
                ],
                'choice_attr' => [
                    'attr' => ['class' => 'form-control'],
                ],
            ])
            ->add('adresse', TextType::class, [
                "attr" => [
                    "class" => "form-control",
                    "placeholder" => "Veuillez entre votre Adresse"
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Mot de passe different',
                'options' => ['attr' => ['class' => 'form-control']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe '],
                'second_options' => ['label' => 'Confirmation de mot de passe'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
