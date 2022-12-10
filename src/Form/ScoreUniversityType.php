<?php

namespace App\Form;

use App\Entity\Filiere;
use App\Entity\ScoreUniversity;
use App\Entity\University;
use App\Repository\FiliereRepository;
use App\Repository\UniversityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScoreUniversityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('score')
            ->add('university',EntityType::class,[
                'class'=>University::class,
                'placeholder' => 'choisir une university',
                'multiple'=>false,
                'expanded'=>false,
                'required'=>true,
                'query_builder' => function (UniversityRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.UniversityName', 'ASC');
                },
            ])
            ->add('Filiere',EntityType::class,[
                'class'=>Filiere::class,
                'placeholder' => 'choisir une ville',
                'multiple'=>false,
                'expanded'=>false,
                'required'=>true,
                'query_builder' => function (FiliereRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.FiliereName', 'ASC');
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ScoreUniversity::class,
        ]);
    }
}
