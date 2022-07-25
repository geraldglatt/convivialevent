<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min-length' => '2',
                    'max-length' => '50',
                ],
                'label' => 'Nom & Prénom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min-length' => '2',
                    'max-length' => '180',
                ],
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('phone', TextType::class, [
                'attr' => [
                    'class' => 'tinymce',
                    'min-length' => '2',
                    'max-length' => '15',
                ],
                'label' => 'Téléphone',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
            ])
            ->add('eventDate', DateType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'widget' => 'single_text',
                'label' => 'Date de votre évènement',
                
            ])
            ->add('AdultGuest', NumberType::class, ['html5' => true], [
                'attr' => [
                    'class' => 'form-control',
                    'label' => 'Vos invités'
                ],
                'label' => 'Nombre d\'adulte',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('childGuest', NumberType::class, ['html5' => true], [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Nombre d\'enfant',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('brunch', ChoiceType::class, [
                'attr' => [
                    'class' => 'form-control mt-4',
                ],
                'required'   => false,
                'choices' => [
                    "" => "",
                    'OUI' => 'true',
                    'NON' => 'false'
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'label' => 'Votre message',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-4'
                ],
                'label' => 'Envoyer votre demande'
            ])
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'contact',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
