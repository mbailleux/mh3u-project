<?php

namespace MH3U\ArmorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MH3UArmorBundle:Default:index.html.twig', array('name' => $name));
    }
}
