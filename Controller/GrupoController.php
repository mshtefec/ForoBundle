<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MWSimple\Bundle\ForoBundle\Entity\Grupo;
use MWSimple\Bundle\ForoBundle\Form\GrupoType;
use MWSimple\Bundle\ForoBundle\Form\GrupoFilterType;

/**
 * Grupo controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/grupo")
 */
class GrupoController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => 'MWSimple/Bundle/ForoBundle/Resources/config/Grupo.yml',
    );

    /**
     * Lists all Grupo entities.
     *
     * @Route("/", name="grupo")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new GrupoFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new Grupo entity.
     *
     * @Route("/", name="grupo_create")
     * @Method("POST")
     * @Template("MWSimpleForoBundle:Grupo:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new GrupoType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new Grupo entity.
     *
     * @Route("/new", name="grupo_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new GrupoType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a Grupo entity.
     *
     * @Route("/{id}", name="grupo_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing Grupo entity.
     *
     * @Route("/{id}/edit", name="grupo_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new GrupoType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing Grupo entity.
     *
     * @Route("/{id}", name="grupo_update")
     * @Method("PUT")
     * @Template("MWSimpleForoBundle:Grupo:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new GrupoType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a Grupo entity.
     *
     * @Route("/{id}", name="grupo_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter Grupo.
     *
     * @Route("/exporter/{format}", name="grupo_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }
}