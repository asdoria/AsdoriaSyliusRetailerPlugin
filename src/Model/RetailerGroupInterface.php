<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Model;

use Sylius\Component\Core\Model\ImageAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;


/**
 * Class RetailerGroupInterface
 *
 * @author Philippe Vesin <pve.asdoria@gmail.com>
 */
interface RetailerGroupInterface extends
    ResourceInterface,
    ImageAwareInterface
{
    /**
     * @return string|null
     */
    public function getPath(): ?string;

}
