<?php

namespace App\Form;

use App\Entity\Currency;
use App\Entity\Lot;
use App\Entity\Measure;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Введите короткое название лота'])
            ->add('description', TextareaType::class, ['label' => 'Введите описание лота'])

            ->add('quantity', IntegerType::class, ['label' => 'Введите количество товара и еденицу измерения'])
            ->add('measure_id', EntityType::class, ['class' => Measure::class])
            ->add('start_price', MoneyType::class, ['label' => 'Введите стартовую цену'])
            ->add('currency_id', EntityType::class, ['class' => Currency::class])

            ->add('type')
            ->add('subcategory')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lot::class,
        ]);
    }
}
