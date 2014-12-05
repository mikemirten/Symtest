<?php

namespace WallPostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('WallPostBundle:Default:index.html.twig', array('name' => $name));
    }
}
