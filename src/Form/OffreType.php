<?php

// src/Form/OffreType.php

namespace App\Form;

use App\Entity\Coupon;
use App\Entity\Offre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jeux')
            ->add('coupon', EntityType::class, [
                'class' => Coupon::class,
                'choice_label' => 'code',
                'required' => false,
                'placeholder' => 'Select a coupon (optional)'
            ])
            ->add('prix', MoneyType::class)
            ->add('lien', UrlType::class)
            ->add('edition', ChoiceType::class, [
                'choices' => [
                    'Standard' => 'standard',
                    'Collector' => 'collector',
                    'Deluxe' => 'deluxe',
                    'Ultimate' => 'ultimate',
                ],
            ])
            ->add('plateformeJeu', ChoiceType::class, [
                'choices' => [
                    'PC' => 'PC',
                    'PlayStation' => 'PlayStation',
                    'Xbox' => 'Xbox',
                    'Nintendo Switch' => 'Nintendo Switch',
                    'Mobile' => 'Mobile',
                ],
            ])
            ->add('plateformeActivation', ChoiceType::class, [
                'choices' => [
                    'Steam' => 'Steam',
                    'Epic Games' => 'Epic Games',
                    'Origin' => 'Origin',
                    'Uplay' => 'Uplay',
                    'GOG' => 'GOG',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
