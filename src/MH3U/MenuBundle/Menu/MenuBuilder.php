<?php

namespace MH3U\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function sideMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('sidebar');

        $menu->setChildrenAttributes(array('class' => 'nav'));

//        $menu->addChild('Monsters',     array('route' => 'core_homepage'));
        $menu->addChild('Items',        array('route' => 'mh3u_items'));
        $menu->addChild('Combinations', array('route' => 'mh3u_combinations'));
//        $menu->addChild('Weapons',      array('route' => 'core_homepage'));
//        $menu->addChild('Armors',       array('route' => 'core_homepage'));
//        $menu->addChild('Quests',       array('route' => 'core_homepage'));

        return $menu;
    }
} 