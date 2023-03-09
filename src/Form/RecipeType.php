<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'placeholder' => "Type de la recette de votre choix",
                'choices' => [
                    'Pièces cocktail' => 'Pièces cocktail',
                    'Entrée' => 'entrée',
                    'Plat Principal' => 'plat principal',
                    'Dessert' => 'dessert',
                ],

            ])
            ->add('difficulty', ChoiceType::class, [
                'label' => 'Difficulté',
                'placeholder' => "Niveau de difficulté de la recette",
                'choices' => [
                    'Facile' => 'Facile',
                    'Moyen' => 'Moyen',
                    'Difficile' => 'Difficile',
                ]  
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-dark align-items-center mt-2 mr-2 text-center'
                ],
                'label' => 'Validez votre choix'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
