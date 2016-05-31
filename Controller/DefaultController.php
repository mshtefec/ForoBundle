<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use MWSimple\Bundle\ForoBundle\Entity\Entrada;
use MWSimple\Bundle\ForoBundle\Form\EntradaType;
use MWSimple\Bundle\ForoBundle\Form\EntradaFilterType;
use Symfony\Component\Yaml\Yaml;

/**
 * Grupo controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/foro")
 */

class DefaultController extends Controller
{
    /**
     * @Route("/{foro_id}", name="mws_front_foro", options={"expose"=true}))
     * @Method("GET")
     */
    public function indexAction(Request $request, $foro_id = null) {
        $request = $this->getRequest();
    	$em = $this->getDoctrine()->getManager();
    	
        $foros = $em->getRepository('MWSimpleForoBundle:Grupo')->findAll();
        
        $foro = $em->getRepository('MWSimpleForoBundle:Grupo')->find($foro_id);
        $entradas = $em->getRepository('MWSimpleForoBundle:Entrada')->getEntradasForo($foro_id);

        return $this->render('MWSimpleForoBundle:Default:index.html.twig', array(
        	'foros'	=> $foros,
            'foro'      => $foro,
            'entradas' => $entradas,
            'foro_id'      => $foro_id,
		));
    }

    /**
     * Finds and displays a Foro entity.
     *
     * @Route("/{foro_id}", name="traer_foro", options={"expose"=true})
     * @Method("GET")
     */
    public function foroAction(Request $request, $foro_id) {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $foro = $em->getRepository('MWSimpleForoBundle:Grupo')->find($foro_id);
        $entradas = $em->getRepository('MWSimpleForoBundle:Entrada')->getEntradasForo($foro_id);
        
        return $this->render('MWSimpleForoBundle:Default:foro.html.twig', array(
            'foro' => $foro,
            'entradas' => $entradas,
        ));
        
    }


}