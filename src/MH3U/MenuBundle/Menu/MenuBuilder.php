<?php

namespace MH3U\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function sideBarMenu(Request $request)
    {
        $menu = $this->factory->createItem('sidebar');

        $menu->setChildrenAttributes(array('class' => 'nav'));

//        $menu->addChild('Monsters',     array('route' => 'core_homepage'));
        $menu->addChild('menu.sidebar.mh3u.items',        array('route' => 'mh3u_items'));
        $menu->addChild('menu.sidebar.mh3u.combinations', array('route' => 'mh3u_combinations'));
//        $menu->addChild('Weapons',      array('route' => 'core_homepage'));
//        $menu->addChild('Armors',       array('route' => 'core_homepage'));
//        $menu->addChild('Quests',       array('route' => 'core_homepage'));

        return $menu;
    }
} 