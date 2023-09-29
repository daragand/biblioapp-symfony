<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        // dans le builder, les classes viennent toutes du component form
       
        $builder
            ->add('name',TextType::class,[
                'label'=>'Votre nom'
            ])
            ->add('email',EmailType::class,[
                'label'=>'Votre email'
            ])
            ->add('sujet',ChoiceType::class,[
                'label'=>'Quel est l\'objet de votre message ?',
                'choices'=>[
                    // pour avoir un élément non sélectionnable, la clé doit être vide
                    'Choisissez un sujet' => '',
                    'Question' => 'Question',
                    'Problème technique' => 'Problème technique',
                    'Améliorations' => 'Améliorations',
                    'Autres' => 'Autres',
                ],
            ])
            ->add('message',TextareaType::class,[
                'label'=>'Ecrivez votre message',
                'attr'=> [
                'placeholder'=>'Ecrivez votre message'
                ]
            ]
            )
            // ->add('message',CKEditorType::class,[
            //     'config' => [
            //         'uiColor'=> '#fff'
            //     ],
            //     'label'=>'Ecrivez votre message',
            //     'attr'=> [
            //     'placeholder'=>'Ecrivez votre message'
            //     ]
            // ]
            // )
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
