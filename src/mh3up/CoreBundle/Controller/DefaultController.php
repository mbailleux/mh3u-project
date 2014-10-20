<?php

namespace mh3up\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->newsAction();
    }

    public function newsAction()
    {
        $news = $this->getDoctrine()->getRepository('mh3upCoreBundle:News')->findActiveOrderedByCreatedAt();

        return $this->render('mh3upCoreBundle:News:index.html.twig', array('news' => $news));
    }
}
