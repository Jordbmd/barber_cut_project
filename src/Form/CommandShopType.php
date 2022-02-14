<?php

namespace App\Form;

use App\Entity\CommandShop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('createdAt')
            ->add('total')
            ->add('isPayed')
            ->add('user')
            ->add('commandDeliveryAddress')
            ->add('commandListProduct')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CommandShop::class,
        ]);
    }
}
