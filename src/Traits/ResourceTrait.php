<?php

declare(strict_types=1);


namespace Asdoria\SyliusRetailerPlugin\Traits;

/**
 * Trait ResourceTrait
 * @package Asdoria\SyliusRetailerPlugin\Traits
 */
trait ResourceTrait
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
