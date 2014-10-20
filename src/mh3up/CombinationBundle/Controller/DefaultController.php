<?php

namespace mh3up\CombinationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $combinations = $this->getDoctrine()->getRepository('mh3upCombinationBundle:Combination')->findAll();

        return $this->render('mh3upCombinationBundle:Combination:index.html.twig', array('combinations' => $combinations));
    }
}
