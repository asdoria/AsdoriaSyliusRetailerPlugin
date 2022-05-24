<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Factory\Model;


use Asdoria\SyliusRetailerPlugin\Model\RetailerGroupInterface;
use Asdoria\SyliusRetailerPlugin\Model\RetailerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

/**
 * Class RetailerFactoryInterface
 * @package Asdoria\SyliusRetailerPlugin\Factory\Model
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
interface RetailerFactoryInterface extends FactoryInterface
{
    /**
     * @param RetailerGroupInterface $group
     *
     * @return RetailerInterface
     */
    public function createForRetailerGroup(RetailerGroupInterface $group): RetailerInterface;
}
