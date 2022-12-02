<?php

namespace App\Form;

use App\Entity\Governorats;
use App\Entity\Score;
use App\Entity\SectionBac;
use App\Repository\GovernoratsRepository;
use App\Repository\SectionBacRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScoreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('MG')
            ->add('sectionBac',EntityType::class,[
                'class'=>SectionBac::class,
                'multiple'=>false,
                'expanded'=>false,
                'required'=>true,
                'query_builder' => function (SectionBacRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.SectionBacName', 'ASC');
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Score::class,
        ]);
    }
}
