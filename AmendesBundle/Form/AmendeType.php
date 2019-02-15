<?php

namespace AmendesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AmendeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant')
            ->add('penalite',HiddenType::class)
            ->add('payee',ChoiceType::class,array(
                'choices'=>array(
                    'oui'=>'Oui',
                    'non'=>'Non'
                )
            ))
            ->add('date', DateType::class)
            ->add('Personne',EntityType::class,array(
                'class'=>'AmendesBundle:Personne',
                'choice_label'=>'cin',
                'multiple'=>false
            ))
            ->add('Ajouter',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AmendesBundle\Entity\Amende'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'amendesbundle_amende';
    }


}
