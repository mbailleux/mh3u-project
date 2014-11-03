<?php

namespace Core\MenuBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

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

    public function navBarMenu(Request $request, SecurityContextInterface $securityContext)
    {
        if ($securityContext->isGranted("ROLE_USER")) {
            return $this->navBarMenuWithUserLoggedMenu($securityContext);
        } else {
            return $this->navBarMenuWithNoUserLoggedMenu();
        }
    }

    public function navBarMenuWithNoUserLoggedMenu()
    {
        $menu = $this->factory->createItem('navbar');

        $menu->setChildrenAttributes(array('class' => 'nav navbar-top-links navbar-right'));

        $menu->addChild('User', array('uri' => '#'));
        $menu['User']->setAttributes(array('class' => 'dropdown'));
        $menu['User']->setLinkAttributes(array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'));
        $menu['User']->setChildrenAttributes(array('class' => 'dropdown-menu'));

        $menu['User']->addChild('Login',    array('route' => 'fos_user_security_login'));
        $menu['User']->addChild('Register', array('route' => 'fos_user_registration_register'));

        return $menu;
    }

    public function navBarMenuWithUserLoggedMenu($securityContext)
    {
        $menu = $this->factory->createItem('navbar');

        $menu->setChildrenAttributes(array('class' => 'nav navbar-top-links navbar-right'));

        $menu->addChild('User', array('uri' => '#'));

        $menu['User']->setAttributes(array('class' => 'dropdown'));
        $menu['User']->setLinkAttributes(array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'));
        $menu['User']->setChildrenAttributes(array('class' => 'dropdown-menu'));

        if ($securityContext->isGranted("ROLE_ADMIN")) {
            $menu['User']->addChild('Admin', array('route' => 'fos_user_profile_edit'));
        }

        $menu['User']->addChild('Settings', array('route' => 'fos_user_profile_edit'));
        $menu['User']->addChild('Logout',   array('route' => 'fos_user_security_logout'));

        return $menu;
    }
} 