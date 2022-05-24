<?php
declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

/**
 *
 */
class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addMenuItems(MenuBuilderEvent $event)
    {
        $menu = $event->getMenu();

        $configuration = $menu->getChild('configuration');
        $configuration->addChild('retailer' , ['route' => 'asdoria_admin_retailer_group_index'])
            ->setLabel('asdoria.menu.admin.main.retailers.header')
            ->setLabelAttribute('icon', 'globe');
    }
}
