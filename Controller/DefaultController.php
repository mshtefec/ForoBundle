<?php

namespace ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ForoBundle:Default:index.html.twig', array('name' => $name));
    }
}
