<?php

namespace App\Form;

use App\Entity\Currency;
use App\Entity\Lot;
use App\Entity\Measure;
use App\Entity\Subcategory;
use App\Entity\Type;
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

            ->add('quantity', IntegerType::class, ['label' => 'Введите количество товара'])
            ->add('measure', EntityType::class, ['class' => Measure::class, 'label' => 'Выберите еденицу измерения для товара'])
            ->add('start_price', MoneyType::class, ['label' => 'Введите стартовую цену', 'currency' => '', 'divisor' => 100])
            ->add('currency', EntityType::class, ['class' => Currency::class, 'label' => 'Выберите валюту'])

            ->add('type', EntityType::class, ['class' => Type::class, 'label' => 'Выберите тип лота(купить/продать)'])
            ->add('subcategory', EntityType::class, ['class' => Subcategory::class, 'label' => 'Выберите категорию'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lot::class,
        ]);
    }
}
