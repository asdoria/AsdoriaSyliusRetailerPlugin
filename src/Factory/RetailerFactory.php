<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Factory;

use Asdoria\SyliusRetailerPlugin\Factory\Model\RetailerFactoryInterface;
use Asdoria\SyliusRetailerPlugin\Model\RetailerGroupInterface;
use Asdoria\SyliusRetailerPlugin\Model\RetailerInterface;

/**
 * Class RetailerGroupFactory
 * @package Asdoria\SyliusRetailerPlugin\Factory
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class RetailerFactory implements RetailerFactoryInterface
{
    /** @var string */
    private $className;

    /**
     * MatrixRetailerGroupFactory constructor.
     *
     * @param string $className
     */
    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * {@inheritdoc}
     */
    public function createNew(): RetailerInterface
    {
        return new $this->className();
    }

    /**
     * @param RetailerGroupInterface $group
     *
     * @return RetailerInterface
     */
    public function createForRetailerGroup(RetailerGroupInterface $group): RetailerInterface
    {
        $retailer = $this->createNew();
        $retailer->setRetailerGroup($group);

        return $retailer;
    }
}
