<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
    	$em = $this->getDoctrine()->getManager();
    	$grupoForo = $em->getRepository('MWSimpleForoBundle:Grupo')->findAll();
    	$entradas = $em->getRepository('MWSimpleForoBundle:Entrada')->findAll();

        return array(
        	'grupoForo' 	=> $grupoForo,
        	'entradas' 		=> $entradas,
		);
    }

    /**
     * Finds and displays a Foro entity.
     *
     * @Route("/{id}", name="traer_foro", options={"expose"=true})
     * @Method("GET")
     */
    public function foroAction($id) {
        
        $em = $this->getDoctrine()->getManager();
        $grupoForo = $em->getRepository('MWSimpleForoBundle:Grupo')->find($id);   

        return $this->render('MWSimpleForoBundle:Default:foro.html.twig', array(
            'grupoForo' => $grupoForo,
        ));
        
    }
}
