<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin;

use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class AsdoriaSyliusRetailerPlugin
 * @package Asdoria\SyliusRetailerPlugin
 *
 * @author  Philippe Vesin <pve.asdoria@gmail.com>
 */
final class AsdoriaSyliusRetailerPlugin extends Bundle
{
    use SyliusPluginTrait;
}
