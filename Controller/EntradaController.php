<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MWSimple\Bundle\ForoBundle\Entity\Entrada;
use MWSimple\Bundle\ForoBundle\Form\EntradaType;
use MWSimple\Bundle\ForoBundle\Form\EntradaFilterType;

/**
 * Entrada controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/foroentrada")
 */
class EntradaController extends Controller
{

    public function newAction($foro_id) {
        $grupo = $this->getGrupo($foro_id);

        $entrada = new Entrada();
        $entrada->setGrupo($grupo);
        $form   = $this->createForm(new EntradaType(), $entrada);

        return $this->render('MWSimpleForoBundle:Entrada:form.html.twig', array(
            'entrada' => $entrada,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Respuesta entity.
     *
     * @Route("/{foro_id}", name="foro_entrada_create")
     * @Method("POST")
     * @Template("MWSimpleForoBundle:Respuesta:create.html.twig")
     */
    public function createAction($foro_id)
    {
        $grupo = $this->getGrupo($foro_id);

        $entrada  = new Entrada();
        $entrada->setGrupo($grupo);
        $request = $this->getRequest();
        $form    = $this->createForm(new EntradaType(), $entrada);
        $form->handleRequest($request);

        if ($form->isValid()) {
            /*
            mws_front_foro
            return $this->redirect($this->generateUrl('BloggerBlogBundle_blog_show', array(
                'id' => $entrada->getGrupo()->getId())) .
                '#entrada-' . $entrada->getId()
            );
            */

            $em = $this->getDoctrine()->getManager();
            $em->persist($entrada);
            $em->flush();

            return $this->redirect($this->generateUrl('foro_mws', array(
                'id' => $entrada->getGrupo()->getId())) .
                '#entrada-' . $entrada->getId()
            );
        }

        return $this->render('MWSimpleForoBundle:Entrada:create.html.twig', array(
            'entrada' => $entrada,
            'form'    => $form->createView()
        ));
    }


    protected function getGrupo($foro_id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $grupo = $em->getRepository('MWSimpleForoBundle:Grupo')->find($foro_id);

        if (!$grupo) {
            throw $this->createNotFoundException('Unable to find Grupo post.');
        }

        return $grupo;
    }
}