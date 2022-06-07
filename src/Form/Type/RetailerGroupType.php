<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\AbstractType;
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
            ->add('name',TextType::class, [
                'label' => 'asdoria.form.retailer_group.name'
                ])
            ->add('image', RetailerGroupImageType::class,
            )
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'asdoria_retailer_group';
    }
}
