<?php

namespace Asdoria\SyliusRetailerPlugin\Entity;

use Asdoria\SyliusRetailerPlugin\Model\RetailerGroupImageInterface;
use Asdoria\SyliusRetailerPlugin\Traits\ResourceTrait;
use Sylius\Component\Core\Model\Image;

class RetailerGroupImage extends Image implements RetailerGroupImageInterface
{
    use ResourceTrait;
}
