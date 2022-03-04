<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;



class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname',TextType::class,[
                'label' => 'Nom',
            ])
            ->add('firstname',TextType::class,[
                'label' => 'Prénom',
            ])
            ->add('phone_number',TextType::class,[
                'label' => 'N° de téléphone',
            ])
            ->add('date', DateTimeType::class,[
                'label'=>"Choisisez une date",
                'widget' => 'choice',
                'input'  => 'datetime_immutable',
                'date_format' => 'd-M-y',
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                    'hour' => 'Heure', 'minute' => 'Minute',
                ],
                
            ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
