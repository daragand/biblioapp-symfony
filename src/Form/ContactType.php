<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        // dans le builder, les classes viennent toutes du component form
       
        $builder
            ->add('name',TextType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email',EmailType::class,[
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('sujet',ChoiceType::class,[
                'choices'=>[
                    // pour avoir un élément non sélectionnable, la clé doit être vide
                    'Choisissez un sujet' => '',
                    'Question' => 'Question',
                    'Problème technique' => 'Problème technique',
                    'Améliorations' => 'Améliorations',
                    'Autres' => 'Autres',
                ],
            ])
            ->add('message',TextareaType::class)
            // ->add('Envoyer',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
