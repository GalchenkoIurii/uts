<?php

namespace App\Form;

use App\Entity\Lot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', )
            ->add('description')
            ->add('placement_date')
            ->add('expiration_date')
            ->add('quantity')
            ->add('start_price')
            ->add('current_price')
            ->add('end_price')
            ->add('currency_id')
            ->add('measure_id')
            ->add('type')
            ->add('subcategory')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lot::class,
        ]);
    }
}
