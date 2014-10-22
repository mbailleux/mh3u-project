<?php

namespace MH3U\CombinationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $combinations = $this->getDoctrine()->getRepository('MH3UCombinationBundle:Combination')->findAll();

        return $this->render('MH3UCombinationBundle:Combination:index.html.twig', array('combinations' => $combinations));
    }
}
