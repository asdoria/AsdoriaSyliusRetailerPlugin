<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\DependencyInjection;

use Asdoria\SyliusRetailerPlugin\Controller\FacetController;
use Asdoria\SyliusRetailerPlugin\Controller\FacetGroupController;
use Asdoria\SyliusRetailerPlugin\Entity\Facet;
use Asdoria\SyliusRetailerPlugin\Entity\FacetGroup;
use Asdoria\SyliusRetailerPlugin\Entity\FacetGroupTranslation;
use Asdoria\SyliusRetailerPlugin\Entity\FacetTranslation;
use Asdoria\SyliusRetailerPlugin\Entity\FacetTypeGeneric;
use Asdoria\SyliusRetailerPlugin\Entity\FacetTypeProductAttribute;
use Asdoria\SyliusRetailerPlugin\Entity\FacetTypeProductOption;
use Asdoria\SyliusRetailerPlugin\Entity\FacetTypeTaxon;
use Asdoria\SyliusRetailerPlugin\Entity\Retailer;
use Asdoria\SyliusRetailerPlugin\Factory\FacetFactory;
use Asdoria\SyliusRetailerPlugin\Factory\FacetGroupFactory;
use Asdoria\SyliusRetailerPlugin\Factory\RetailerFactory;
use Asdoria\SyliusRetailerPlugin\Form\Type\FacetGroupTranslationType;
use Asdoria\SyliusRetailerPlugin\Form\Type\FacetGroupType;
use Asdoria\SyliusRetailerPlugin\Form\Type\FacetTranslationType;
use Asdoria\SyliusRetailerPlugin\Form\Type\FacetType;
use Asdoria\SyliusRetailerPlugin\Form\Type\FacetTypeProductAttributeType;
use Asdoria\SyliusRetailerPlugin\Form\Type\FacetTypeProductOptionType;
use Asdoria\SyliusRetailerPlugin\Form\Type\FacetTypeTaxonType;
use Asdoria\SyliusRetailerPlugin\Form\Type\RetailerType;
use Asdoria\SyliusRetailerPlugin\Model\FacetGroupInterface;
use Asdoria\SyliusRetailerPlugin\Repository\FacetGroupRepository;
use Asdoria\SyliusRetailerPlugin\Repository\FacetRepository;
use Asdoria\SyliusRetailerPlugin\Repository\RetailerRepository;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Asdoria\SyliusRetailerPlugin\DependencyInjection
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('asdoria_retailer');
        /** @var ArrayNodeDefinition $rootNode */
        $rootNode = $treeBuilder->getRootNode();
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
            ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
        $this->addResourcesSection($rootNode);

        return $treeBuilder;
    }


    private function addResourcesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('resources')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('retailer_group')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(RetailerGroup::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->defaultValue(RetailerGroupRepository::class)->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->scalarNode('form')->defaultValue(RetailerGroupType::class)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('retailer')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Retailer::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(RetailerController::class)->cannotBeEmpty()->end()
                                        ->scalarNode('repository')->defaultValue(RetailerRepository::class)->cannotBeEmpty()->end()
                                        ->scalarNode('factory')->defaultValue(RetailerFactory::class)->end()
                                        ->scalarNode('form')->defaultValue(RetailerType::class)->cannotBeEmpty()->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                        ->end()
                    ->end()
            ->end();
    }

}
