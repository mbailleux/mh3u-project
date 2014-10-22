<?php

namespace MH3U\WeaponBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MH3UWeaponBundle:Default:index.html.twig', array('name' => $name));
    }
}
