<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Form\Type;

use Asdoria\SyliusRetailerPlugin\Entity\RetailerGroup;
use Sylius\Bundle\AddressingBundle\Form\Type\CountryCodeChoiceType;
use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class RetailerType
 * @package Asdoria\SyliusRetailerPlugin\Form\Type
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class RetailerType extends AbstractResourceType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addEventSubscriber(new AddCodeFormSubscriber())
            ->add('name', TextType::class, [
                'label' => 'asdoria.form.retailer.name',
            ])
            ->add('countryCode', CountryCodeChoiceType::class, [
                'label' => 'asdoria.form.address.country',
            ])
            ->add('street', TextType::class, [
                'label' => 'asdoria.form.address.street',
            ])
            ->add('city', TextType::class, [
                'label' => 'asdoria.form.address.city',
            ])
            ->add('postcode', TextType::class, [
                'label' => 'asdoria.form.address.postcode',
            ])
            ->add('latitude', TextType::class, [
                'label'    => 'asdoria.form.retailer.latitude',
                'required' => false
            ])
            ->add('longitude', TextType::class, [
                'label'    => 'asdoria.form.retailer.longitude',
                'required' => false
            ])
            ->add('retailerGroup', EntityType::class, [
                'label' => 'asdoria.form.retailer.retailer_group',
                'class' => RetailerGroup::class,
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'asdoria.form.retailer.phonenumber',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'asdoria_retailer';
    }
}
