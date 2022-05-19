<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Traits;


use Asdoria\SyliusRetailerPlugin\Model\RetailerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class RetailersTrait
 * @package Asdoria\SyliusRetailerPlugin\Traits
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
trait RetailersTrait
{
    /** @var Collection|null */
    protected $retailers;

    /**
     * RetailersTrait constructor.
     */
    public function initializeRetailersCollection()
    {
        $this->retailers = new ArrayCollection();
    }

    /**
     * @return Collection|null
     */
    public function getRetailers(): ?Collection
    {
        return $this->retailers;
    }

    /**
     * @return bool
     */
    public function hasRetailers(): bool
    {
        return !$this->retailers->isEmpty();
    }

    /**
     * @param RetailerInterface $retailer
     *
     * @return bool
     */
    public function hasRetailer(RetailerInterface $retailer): bool
    {
        return $this->retailers->contains($retailer);
    }

    /**
     * @param RetailerInterface $retailer
     */
    public function addRetailer(RetailerInterface $retailer): void
    {
        $this->retailers->add($retailer);
    }

    /**
     * @param RetailerInterface $retailer
     */
    public function removeRetailer(RetailerInterface $retailer): void
    {
        if ($this->hasRetailer($retailer)) {
            $this->retailers->removeElement($retailer);
        }
    }
}
