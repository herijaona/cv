<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, [
                'required' => false,
                'label' => "Avatar"
            ])
            ->add('Titre', TextType::class, [
                "attr" => [
                    "placeholder" => "Veuillez entre votre Titre",
                    "class" => "form-control"
                ]
            ])
            ->add('Description', TextareaType::class, [
                "attr" => [
                    "placeholder" => "Veuillez entre votre Description",
                    "class" => "form-control"
                ]
            ])
            ->add('DateExpiration', DateType::class, [
                'widget' => 'single_text',
                "attr" => [
                    "placeholder" => "Veuillez entre votre Description",
                    "class" => "form-control"
                ]
            ])
            ->add('Category', ChoiceType::class, [
                "label" => "Categorie de Travail",
                "attr" => [
                    "class" => "form-control"
                ],
                'choices'  => [
                    'Choisir Caterorie' => null,
                    'Biologie / chimie/Sciences' => "Biologie / chimie/ Sciences",
                    'Commercial/ Vente' => 'Commercial/ Vente',
                    'Confection/ Artisan' => 'Confection/ Artisan',
                    'Conseiller client /Call center' => 'Conseiller client /Call center',
                    'Consultant / Enquêteur' => 'Consultant / Enquêteur',
                    'Droit / Juriste' => 'Droit / Juriste',
                    'Enseignement' => 'Enseignement',
                    'Evénementiel' => 'Evénementiel',
                    'Gestion / Comptabilité / Finance' => 'Gestion / Comptabilité / Finance',
                    'Humanitaire / Social' => 'Humanitaire / Social',
                    'Import / Export' => 'Import / Export',
                    'Informatique / web' => 'Informatique / web',
                    'Ingénierie / industrie / BTP' => 'Ingénierie / industrie / BTP',
                    'Journalisme / Langue / Interprète' => 'Journalisme / Langue / Interprète',
                    'Logistique / Achats' => 'Logistique / Achats',
                    "Main d'oeuvre / Ménage / Chauffeur" => "Main d'oeuvre / Ménage / Chauffeur",
                    "Maintenance / Mécanique" => "Maintenance / Mécanique",
                    "Management / RH" => "Management / RH",
                    "Marketing / Communication" => "Marketing / Communication",
                    "Medecine / Santé" => "Medecine / Santé",
                    "Mode / beauté" => "Mode / beauté",
                    "Qualité / Normes" => "Qualité / Normes",
                    "Réception / Accueil / Standard" => "Réception / Accueil / Standard",
                    "Rédaction / Saisie / Offshore" => "Rédaction / Saisie / Offshore",
                    "Responsable / Direction / Administration" => "Responsable / Direction / Administration",
                    "Restauration / hôtellerie" => "Restauration / hôtellerie",
                    "Sécrétariat / Assistanat" => "Sécrétariat / Assistanat",
                    "Securité" => "Securité",
                    "Télé-vente / Prospection / Enquête" => "Télé-vente / Prospection / Enquête",
                    "Télécommunication" => "Télécommunication",
                    "Tourisme / Voyage" => "Tourisme / Voyage",
                ],
            ])
            ->add('Type', ChoiceType::class, [
                "label" => "Contrat de Travail",
                "attr" => [
                    "class" => "form-control"
                ],
                'choices'  => [
                    'Type de contrat' => null,
                    'CDD' => "CDD",
                    'CDI' => "CDI",
                    'Fonction publique' => "Fonction publique",
                    'Free-lance' => "Free-lance",
                    'Intérim' => "Intérim",
                    'Stage' => "Stage",
                    'Urgente' => "Urgente",
                ],
            ])
            ->add('Niveau', ChoiceType::class, [
                "attr" => [
                    "class" => "form-control"
                ],
                'choices'  => [
                    'Niveau' => null,
                    'Junior' => "Junior",
                    'Manager' => "Manager",
                    'Senior' => "Senior",
                ],
            ])
            ->add('save', SubmitType::class, [
                "label" => ' Publier et Voir les Detail',
                "attr" => [
                    "class" => "btn-savepreview ti-angle-double-right"
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
