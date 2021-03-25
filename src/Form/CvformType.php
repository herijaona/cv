<?php

namespace App\Form;

use App\Entity\Competences;
use App\Entity\Experience;
use App\Entity\Formations;
use App\Entity\Langue;
use App\Form\ExperienceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CvformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Profile', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add(
                $builder->create('Experiences', FormType::class, ['by_reference' => Experience::class])
                    ->add('titre', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre titre d'employe"
                        ]
                    ])
                    ->add('societe', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre societe"
                        ]
                    ])
                    ->add('datedebut', DateType::class, [
                        // renders it as a single text box
                        'widget' => 'single_text',
                        "label" => "Date de Debut",
                        "attr" => [
                            "class" => "form-control"
                        ]
                    ])
                    ->add('datefin', DateType::class, [
                        // renders it as a single text box
                        'widget' => 'single_text',
                        "label" => "Date de Fin",
                        "attr" => [
                            "class" => "form-control",
                        ]
                    ])
                    ->add('description', TextareaType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre Description"
                        ]
                    ])
                    ->add('ajouter', ButtonType::class, [
                        "attr" => [
                            "class" => "btn btn-primary experiences"
                        ]
                    ])
            )
            ->add(
                $builder->create('Formations', FormType::class, ['by_reference' => Formations::class])
                    ->add('titre', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre titre de Formation"
                        ]
                    ])
                    ->add('etablissement', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre Etablissement"
                        ]
                    ])
                    ->add('datedebut', DateType::class, [
                        // renders it as a single text box
                        'widget' => 'single_text',
                        "label" => "Date de Debut",
                        "attr" => [
                            "class" => "form-control"
                        ]
                    ])
                    ->add('datefin', DateType::class, [
                        // renders it as a single text box
                        'widget' => 'single_text',
                        "label" => "Date de Fin",
                        "attr" => [
                            "class" => "form-control",
                        ]
                    ])
                    ->add('diplome', TextareaType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre Diplome"
                        ]
                    ])
                    ->add('ajouter', ButtonType::class, [
                        "attr" => [
                            "class" => "btn btn-primary"
                        ]
                    ])
            )
            ->add(
                $builder->create('Educations', FormType::class, ['by_reference' => Formations::class])
                    ->add('titre', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre titre de Formation"
                        ]
                    ])
                    ->add('ecole', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre Etablissement"
                        ]
                    ])
                    ->add('datedebut', DateType::class, [
                        // renders it as a single text box
                        'widget' => 'single_text',
                        "label" => "Date de Debut",
                        "attr" => [
                            "class" => "form-control"
                        ]
                    ])
                    ->add('datefin', DateType::class, [
                        // renders it as a single text box
                        'widget' => 'single_text',
                        "label" => "Date de Fin",
                        "attr" => [
                            "class" => "form-control",
                        ]
                    ])
                    ->add('diplome', TextareaType::class, [
                        "label" => "Diplôme Obtenu",
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuille entre votre Diplome"
                        ]
                    ])
                    ->add('ajouter', ButtonType::class, [
                        "attr" => [
                            "class" => "btn btn-primary"
                        ]
                    ])
            )
            ->add(
                $builder->create('Competences', FormType::class, ['by_reference' => Competences::class])
                    ->add('competence', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuillez entre votre Competences"
                        ]
                    ])
                    ->add('valeur', IntegerType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuillez entre votre valeur en porcentage"
                        ]
                    ])

                    ->add('ajouter', ButtonType::class, [
                        "attr" => [
                            "class" => "btn btn-primary"
                        ]
                    ])
            )
            ->add(
                $builder->create('Langues', FormType::class, ['by_reference' => Langue::class])
                    ->add('langue', TextType::class, [
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuillez entre votre Langue"
                        ]
                    ])
                    ->add('niveau', ChoiceType::class, [
                        'choices'  => [
                            'Selectionner' => null,
                            'Notions' => "Notions",
                            'Intermediaire' => "Intermediaire",
                            'Bon' => "Bon",
                            'Avance' => "Avance",
                            'Expert' => "Expert",
                        ],
                        "attr" => [
                            "class" => "form-control",
                            "placeholder" => "Veuillez entre votre niveau"
                        ]
                    ])

                    ->add('ajouter', ButtonType::class, [
                        "attr" => [
                            "class" => "btn btn-primary"
                        ]
                    ])
            )
            ->add('submit', SubmitType::class, [
                "label" => "Sauvegarder",
                "attr" => [
                    "class" => "btn-savepreview"
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
