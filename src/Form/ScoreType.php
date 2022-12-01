<?php

namespace App\Form;

use App\Entity\SectionBac;
use App\Entity\Score;
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
            ->add('sectionbac',EntityType::class,[
                'class'=>SectionBac::class,
                'multiple'=>true,
                'expanded'=>false,
                'required'=>true,
                'query_builder' => function (SectionBacRepository $er) {
                    return $er->createQueryBuilder('S')
                        ->orderBy('S.SectionBacName', 'ASC');
                },
            ])
            ->add('MG')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Score::class,
        ]);
    }
}
