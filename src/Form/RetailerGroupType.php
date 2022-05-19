<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\DataTransformer\NumberToLocalizedStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class BrandGroupType
 * @package App\Form\Type
 */
class RetailerGroupType extends AbstractResourceType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('rating', NumberType::class, [
                'label' => 'sylius.form.brand_group.rating',
                'empty_data' => '0',
                'rounding_mode' => NumberToLocalizedStringTransformer::ROUND_HALF_UP,
                'scale' => 0,
                'attr' => [
                    'min' => 0,
                    'max' => 10
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'asdoria_retailer_group';
    }
}
