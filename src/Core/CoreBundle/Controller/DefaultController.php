<?php

namespace Core\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->newsAction();
    }

    public function newsAction()
    {
        $news = $this->getDoctrine()->getRepository('CoreCoreBundle:News')->findActiveOrderedByCreatedAt();

        return $this->render('CoreCoreBundle:News:index.html.twig', array('news' => $news));
    }
}
