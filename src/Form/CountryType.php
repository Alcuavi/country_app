<?php

namespace App\Form;

use App\Entity\Country;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('code', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('population', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('flag', TextType::class, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('region', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('subregion', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('capital', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('area', null, [
                'attr' => ['class' => 'form-control']
            ])
            ->add('languages', CollectionType::class, [
                'entry_type' => TextType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('borders', CollectionType::class, [
                'entry_type' => TextType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('nativeName', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('numericCode', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('currencies', CollectionType::class, [
                'entry_type' => CurrencyType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('timezones', CollectionType::class, [
                'entry_type' => TextType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Country::class,
        ]);
    }
}