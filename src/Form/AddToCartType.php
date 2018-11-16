<?php

namespace App\Form;

use App\Entity\CartItem;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddToCartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'quantity',
                NumberType::class,
                [
                    'label' => false,
                    'attr'  => [
                        'class' => 'col-sm-6',
                    ],
                ]
            )
            ->add(
                'product',
                HiddenEntityType::class,
                [
                    'class' => Product::class,
                ]
            )
            ->add(
                'add_to_cart',
                SubmitType::class,
                [
                    'label' => 'cart.add',
                    'attr'  => [
                        'class' => 'col-sm-6',
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => CartItem::class,
            ]
        );
    }
}
