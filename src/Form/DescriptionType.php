<?php

namespace App\Form;

use App\Entity\Description;
use App\Entity\MetierA;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use Symfony\Component\OptionsResolver\OptionsResolver;

class DescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('contenu',textType::class,['label'=>'votre pseudo',
        'attr'=>['class'=>'form-control']])
        
        ->add('MetierA',EntityType::class,['class' => MetierA::class,
        'choice_label' => 'Nom'  ]) ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Description::class,
        ]);
    }
}
