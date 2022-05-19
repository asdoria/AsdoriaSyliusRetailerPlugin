<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Model;

use App\Traits\ResourceTrait;
use App\Traits\RetailersTrait;
use Sylius\Component\Resource\Model\ResourceInterface;


/**
 * Class RetailerGroupInterface
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
interface RetailerGroupInterface extends ResourceInterface
{ 
    /**
     * @return int
     */
    public function getRating(): int;

    /**
     * @param int $rating
     */
    public function setRating(int $rating): void;
}
