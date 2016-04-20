<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/foro/")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'WELCOME TO THE FORUM');
    }
}
