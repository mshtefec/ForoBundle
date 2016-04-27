<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Grupo controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/foro")
 */

class DefaultController extends Controller
{
    /**
     * @Route("/", name="mws_front_foro")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => "Default Index");
    }
}
