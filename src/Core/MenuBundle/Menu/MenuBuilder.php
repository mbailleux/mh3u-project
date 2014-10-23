<?php

namespace Core\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function navWithNoUserLoggedMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('navbar');

        $menu->setChildrenAttributes(array('class' => 'nav navbar-top-links navbar-right'));

        $menu->addChild('User', array('uri' => '#'));
        $menu['User']->setAttributes(array('class' => 'dropdown'));
        $menu['User']->setLinkAttributes(array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'));
        $menu['User']->setChildrenAttributes(array('class' => 'dropdown-menu'));

        $menu['User']->addChild('Login',    array('route' => 'fos_user_security_login'));
        $menu['User']->addChild('Register', array('route' => 'fos_user_registration_register'));

        return $menu;
    }

    public function navWithUserLoggedMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('navbar');

        $menu->setChildrenAttributes(array('class' => 'nav navbar-top-links navbar-right'));

        $menu->addChild('User', array('uri' => '#'));

        $menu['User']->setAttributes(array('class' => 'dropdown'));
        $menu['User']->setLinkAttributes(array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'));
        $menu['User']->setChildrenAttributes(array('class' => 'dropdown-menu'));

        $menu['User']->addChild('Settings', array('route' => 'fos_user_profile_edit'));
        $menu['User']->addChild('Logout',   array('route' => 'fos_user_security_logout'));

        return $menu;
    }
} 