<?php

namespace mh3up\MenuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('mh3upMenuBundle:Default:index.html.twig', array('name' => $name));
    }
}
