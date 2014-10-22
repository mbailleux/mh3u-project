<?php

namespace MH3U\ItemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $items = $this->getDoctrine()->getRepository('MH3UItemBundle:Item')->findAll();

        return $this->render('MH3UItemBundle:Item:index.html.twig', array('items' => $items));
    }
}
