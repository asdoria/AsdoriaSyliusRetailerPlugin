<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Entity;


use Asdoria\SyliusRetailerPlugin\Model\RetailerGroupInterface;
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

    /** @var int */
    protected int $rating = 0;

    public function __construct() {
        $this->initializeRetailersCollection();
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }
}
