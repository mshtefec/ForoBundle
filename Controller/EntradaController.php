<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MWSimple\Bundle\ForoBundle\Entity\Entrada;
use MWSimple\Bundle\ForoBundle\Form\EntradaType;
use MWSimple\Bundle\ForoBundle\Form\EntradaFilterType;

/**
 * Entrada controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/entrada")
 */
class EntradaController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'MWSimple/Bundle/ForoBundle/Resources/config/Entrada.yml',
    );

    /**
     * Lists all Entrada entities.
     *
     * @Route("/", name="entrada")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new EntradaFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Entrada entity.
     *
     * @Route("/", name="entrada_create")
     * @Method("POST")
     * @Template("MWSimpleForoBundle:Entrada:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new EntradaType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Entrada entity.
     *
     * @Route("/new", name="entrada_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new EntradaType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Entrada entity.
     *
     * @Route("/{id}", name="entrada_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Entrada entity.
     *
     * @Route("/{id}/edit", name="entrada_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new EntradaType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Entrada entity.
     *
     * @Route("/{id}", name="entrada_update")
     * @Method("PUT")
     * @Template("MWSimpleForoBundle:Entrada:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new EntradaType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Entrada entity.
     *
     * @Route("/{id}", name="entrada_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter Entrada.
     *
     * @Route("/exporter/{format}", name="entrada_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}