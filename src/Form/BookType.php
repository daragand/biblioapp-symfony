<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Format;
use App\Entity\Book;
use App\Entity\Category;
use App\Entity\Editor;
use App\Entity\Language;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>'Titre du livre',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('year',NumberType::class,[
                'label'=>'Année du livre',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('isbn',TextType::class,[
                'label'=>'ISBN',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('price',MoneyType::class,[
                'label'=>'Prix du livre',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('pages',NumberType::class,[
                'label'=>'Nombre de page',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('description',TextareaType::class,[
                'label'=>'Résumé',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('slug',TextType::class,[
                'label'=>'Slug',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('cover',TextType::class,[
                'label'=>'Page de Couverture',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('isAvailable',CheckboxType::class,[
                'label'=>'Disponibilité',
                'attr'=>[
                    'class'=>'form-check'
                ],
            ])
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                'choice_label'=>'name',//class de l'entité
                'label'=>'Catégorie du livre',
                'attr'=>[
                    'class'=>'form-control'//class bootstrap
                ],
            ])
            ->add('authors',EntityType::class,[
                'class'=>Author::class,
                'choice_label'=>'firstname',
                'multiple'=>true,//dans un ManytoMany, il est nécessaire d'ajouter cela pour que ça fonctionne
                'label'=>'Auteur(s) du livre',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('format',EntityType::class,[
                'class'=>Format::class,
                'choice_label'=>'name',
                'label'=>'Catégorie du livre',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('editor',EntityType::class,[
                'class'=>Editor::class,
                'choice_label'=>'name',
                'label'=>'Catégorie du livre',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
            ->add('language',EntityType::class,[
                'class'=>Language::class,
                'choice_label'=>'name',
                'label'=>'Langue du livre',
                'attr'=>[
                    'class'=>'form-control'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
