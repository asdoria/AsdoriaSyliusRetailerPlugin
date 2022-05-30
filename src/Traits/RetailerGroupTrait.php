<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Traits;

use Asdoria\SyliusRetailerPlugin\Model\RetailerGroupInterface;

/**
 *
 */
trait RetailerGroupTrait
{
    /**
     * @var RetailerGroupInterface|null
     */
    protected ?RetailerGroupInterface $retailerGroup;

    /**
     * @return RetailerGroupInterface|null
     */
    public function getRetailerGroup(): ?RetailerGroupInterface
    {
        return $this->retailerGroup;
    }

    /**
     * @param RetailerGroupInterface|null $retailerGroup
     */
    public function setRetailerGroup(?RetailerGroupInterface $retailerGroup): void
    {
        $this->retailerGroup = $retailerGroup;
    }
}
