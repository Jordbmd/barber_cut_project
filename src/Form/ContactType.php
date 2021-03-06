<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname',TextType::class,[
                'required' => false,
                'label' => 'Nom',
                'constraints' =>[
                    new NotBlank([
                        'message'=> 'We need your name'
                    ]),
                ]
            ])
            ->add('email',TextType::class,[
                'required' => false,
                'label' => 'E-mail',
                'constraints' =>[
                    new NotBlank([
                        'message'=> 'Your Email here'
                    ]),
                ]
            ])
            ->add('phone',TextType::class,[
                'required' => false,
                'label' => 'N° de téléphone',
                'constraints' =>[
                    new NotBlank([
                        'message'=> 'Your phone number here'
                    ]),
                ]
            ])
            ->add('subject',TextType::class,[
                'required' => false,
                'label' => 'Objet',
                'constraints' =>[
                new NotBlank([
                    'message'=> 'Subject'
                ]),
            ]
        ])

            ->add('content',TextareaType::class,[
                'required' => false,
                'label' => 'Votre message',
                'constraints' =>[
                new NotBlank([
                    'message'=> 'Your Message here'
                ]),
            ]
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
