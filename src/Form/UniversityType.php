<?php

namespace App\Form;

use App\Entity\Filiere;
use App\Entity\Governorats;
use App\Entity\University;
use App\Repository\FiliereRepository;
use App\Repository\GovernoratsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UniversityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('UniversityName')
            ->add('ville',EntityType::class,[
                'class'=>Governorats::class,
                'multiple'=>false,
                'expanded'=>false,
                'required'=>true,
                'query_builder' => function (GovernoratsRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.name', 'ASC');
                },
            ])
            ->add('filiere',EntityType::class,[
                'class' => Filiere::class,
                'multiple' => true,
                'expanded' => false,
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
            'data_class' => University::class,
        ]);
    }
}
