<?php

namespace App\Form;

use App\Entity\Filiere;
use App\Entity\Governorats;
use App\Entity\University;
use App\Repository\FiliereRepository;
use App\Repository\GovernoratsRepository;
use App\Repository\UniversityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuideFiltreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('university',EntityType::class,[
                'class'=>University::class,

                'placeholder' => 'choisir une universitee',
                'multiple'=>false,
                'expanded'=>false,
                'required'=>false,
                'query_builder' => function (UniversityRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.UniversityName', 'ASC');
                },
            ])
            ->add('ville',EntityType::class,[
                'class'=>Governorats::class,
                'placeholder' => 'choisir une ville',
                'choice_label'=>'name',
                'multiple'=>false,
                'expanded'=>false,
                'required'=>false,
                'query_builder' => function (GovernoratsRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.name', 'ASC');
                },
            ])
            ->add('Filiere',EntityType::class,[
                'class'=>Filiere::class,
                'placeholder' => 'Choisir une speciality',
                'multiple'=>true,
                'expanded'=>true,
                'required'=>false,
                'query_builder' => function (FiliereRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.FiliereName', 'ASC');
                },
            ])

            ->add('best',CheckboxType::class,[
                'label'=>"Meuilleur chois selon votre score",
                'required'=>false

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
