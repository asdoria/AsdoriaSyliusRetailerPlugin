<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Entity;


use Asdoria\SyliusRetailerPlugin\Model\RetailerGroupImageInterface;
use Asdoria\SyliusRetailerPlugin\Model\RetailerGroupInterface;
use Asdoria\SyliusRetailerPlugin\Traits\ImageTrait;
use Asdoria\SyliusRetailerPlugin\Traits\NamingTrait;
use Asdoria\SyliusRetailerPlugin\Traits\ResourceTrait;
use Asdoria\SyliusRetailerPlugin\Traits\RetailersTrait;

/**
 * Class RetailerGroup
 * @package Asdoria\SyliusRetailerPlugin\Entity
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
class RetailerGroup implements RetailerGroupInterface
{
    use ResourceTrait;
    use RetailersTrait;
    use NamingTrait;
    use ImageTrait;

    public function __construct() {
        $this->initializeRetailersCollection();
    }

    /**
     * @return null|string
     */
    public function getPath(): ?string
    {
        if (!$this->getImage() instanceof RetailerGroupImageInterface) {
            return null;
        }

        return $this->getImage()->getPath();
    }




}
