<?php

namespace App\Form;

use App\Entity\Competences;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompetenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Competence', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Niveau', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'choices'  => [
                    'Selectionner' => null,
                    'Notion' => 'Notion',
                    'Intermediaire' => 'Intermediaire',
                    'Expert' => 'Expert',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Competences::class,
        ]);
    }
}
