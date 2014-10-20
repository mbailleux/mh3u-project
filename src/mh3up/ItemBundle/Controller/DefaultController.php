<?php

namespace mh3up\ItemBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $items = $this->getDoctrine()->getRepository('mh3upItemBundle:Item')->findAll();

        return $this->render('mh3upItemBundle:Item:index.html.twig', array('items' => $items));
    }
}
