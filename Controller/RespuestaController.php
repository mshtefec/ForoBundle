<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use MWSimple\Bundle\ForoBundle\Entity\Respuesta;
use MWSimple\Bundle\ForoBundle\Form\RespuestaType;
use MWSimple\Bundle\ForoBundle\Form\RespuestaFilterType;

/**
 * Respuesta controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/fororespuesta")
 */
class RespuestaController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => '/../Resources/config/Respuesta.yml',
    );

    protected function getConfig(){
        $configs = Yaml::parse(file_get_contents(__DIR__ . $this->config['yml']));
        foreach ($configs as $key => $value) {
            $config[$key] = $value;
        }
        foreach ($this->config as $key => $value) {
            if ($key != 'yml') {
                $config[$key] = $value;
            }
        }
        return $config;
    }

    /**
     * Lists all Respuesta entities.
     *
     * @Route("/", name="foro_respuesta")
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
     * @Route("/", name="foro_respuesta_create")
     * @Method("POST")
     * @Template("SistemaForoBundle:Respuesta:new.html.twig")
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
     * @Route("/new", name="foro_respuesta_new")
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
     * @Route("/{id}", name="foro_respuesta_show")
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
     * @Route("/{id}/edit", name="foro_respuesta_edit")
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
     * @Route("/{id}", name="foro_respuesta_update")
     * @Method("PUT")
     * @Template("SistemaForoBundle:Respuesta:edit.html.twig")
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
     * @Route("/{id}", name="foro_respuesta_delete")
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
     * @Route("/exporter/{format}", name="foro_respuesta_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a Respuesta entity.
     *
     * @Route("/autocomplete-forms/get-miembro", name="Respuesta_autocomplete_miembro")
     */
    public function getAutocompleteUser()
    {
        $options = array(
            'repository' => "SistemaForoBundle:User",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a Respuesta entity.
     *
     * @Route("/autocomplete-forms/get-entrada", name="Respuesta_autocomplete_entrada")
     */
    public function getAutocompleteEntrada()
    {
        $options = array(
            'repository' => "SistemaForoBundle:Entrada",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }
}