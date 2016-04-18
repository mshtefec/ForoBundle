<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MWSimple\Bundle\ForoBundle\Entity\Respuesta;
use MWSimple\Bundle\ForoBundle\Form\RespuestaType;
use MWSimple\Bundle\ForoBundle\Form\RespuestaFilterType;

/**
 * Respuesta controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/respuesta")
 */
class RespuestaController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'MWSimple/Bundle/ForoBundle/Resources/config/Respuesta.yml',
    );

    /**
     * Lists all Respuesta entities.
     *
     * @Route("/", name="respuesta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new RespuestaFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Respuesta entity.
     *
     * @Route("/", name="respuesta_create")
     * @Method("POST")
     * @Template("MWSimpleForoBundle:Respuesta:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new RespuestaType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Respuesta entity.
     *
     * @Route("/new", name="respuesta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new RespuestaType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Respuesta entity.
     *
     * @Route("/{id}", name="respuesta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Respuesta entity.
     *
     * @Route("/{id}/edit", name="respuesta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new RespuestaType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Respuesta entity.
     *
     * @Route("/{id}", name="respuesta_update")
     * @Method("PUT")
     * @Template("MWSimpleForoBundle:Respuesta:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new RespuestaType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Respuesta entity.
     *
     * @Route("/{id}", name="respuesta_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter Respuesta.
     *
     * @Route("/exporter/{format}", name="respuesta_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}