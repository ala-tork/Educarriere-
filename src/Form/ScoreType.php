<?php

namespace App\Form;

use App\Entity\Score;
use App\Entity\SectionBac;
use App\Repository\SectionBacRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScoreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('MG')
            ->add('moyenne_francais')
            ->add('moyenne_anglais')
            ->add('moyenne_algo')
            ->add('moyenne_math')
            ->add('moyenne_BD')
            ->add('moyenne_physique')
            ->add('moyenne_tic')
            ->add('moyenne_science')
            ->add('moyenne_gestion')
            ->add('moyenne_eco')
            ->add('moyenne_histoirGeo')
            ->add('moyenne_technique')
            ->add('moyenne_phylo')
            ->add('moyenne_arab')

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
