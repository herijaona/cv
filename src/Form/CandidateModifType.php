<?php

namespace App\Form;

use App\Entity\Candidate;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CandidateModifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', VichImageType::class, [
                'required' => false,
                'allow_delete' => true,
                'delete_label' => '...',
                'download_label' => '...',
                'download_uri' => true,
                'image_uri' => true,
                'imagine_pattern' => '...',
                'asset_helper' => true,
            ])
            ->add('Nom', TextType::class)
            ->add('Prenom', TextType::class)
            ->add('Telephone', TelType::class)
            ->add('DateDeNaissance', DateType::class)
            ->add('sexe', ChoiceType::class)
            ->add('Adresse', TextType::class)
            ->add('Apropos', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidate::class,
        ]);
    }
}
