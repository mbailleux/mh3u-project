<?php

namespace MH3U\DataBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MH3UDataBundle:Default:index.html.twig', array('name' => $name));
    }
}
