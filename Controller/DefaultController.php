<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

        return array(
        	'grupoForo'	=> $grupoForo,
		);
    }

    /**
     * Finds and displays a Foro entity.
     *
     * @Route("/{id}", name="traer_foro", options={"expose"=true})
     * @Method("GET")
     */
    public function foroAction(Request $request, $id) {
        $data = $request->request->all();

        $em = $this->getDoctrine()->getManager();
        $foro = $em->getRepository('MWSimpleForoBundle:Grupo')->find($id);  
        
        return $this->render('MWSimpleForoBundle:Default:foro.html.twig', array(
            'foro' => $foro,
        ));
        
    }

    /**
     * Finds and displays a Foro entity.
     *
     * @Route("/entrada/{id}", name="traer_entrada", options={"expose"=true})
     * @Method("GET")
     */
    public function entradaAction(Request $request, $id) {
        $data = $request->request->all();

        $em = $this->getDoctrine()->getManager();
        $entrada = $em->getRepository('MWSimpleForoBundle:Entrada')->find($id);  
        
        return $this->render('MWSimpleForoBundle:Default:entrada.html.twig', array(
            'entrada' => $entrada,
        ));
        
    }
}
