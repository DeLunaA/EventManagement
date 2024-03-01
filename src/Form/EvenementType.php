<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;



class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Date is required']), 
                ],
            ])
            ->add('titre', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Titre is required']),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Title must be at least {{ limit }} characters long',
                    ]),  
                ],
            ])
            ->add('description', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Description is required']), 
                ],
            ])
            ->add('lieu', null, [
                'constraints' => [
                    new NotBlank(['message' => 'Lieu is required']), 
                ],
            ])
            ->add('participation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
