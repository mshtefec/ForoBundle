<?php

namespace MWSimple\Bundle\ForoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MWSimple\Bundle\AdminCrudBundle\Controller\DefaultController as Controller;
use MWSimple\Bundle\ForoBundle\Entity\Usuario;
use MWSimple\Bundle\ForoBundle\Form\UsuarioType;
use MWSimple\Bundle\ForoBundle\Form\UsuarioFilterType;

/**
 * Usuario controller.
 * @author Nombre Apellido <name@gmail.com>
 *
 * @Route("/forousuario")
 */
class UsuarioController extends Controller
{
    /**
     * Configuration file.
     */
    protected $config = array(
        'yml' => '/../Resources/config/Usuario.yml',
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
     * Lists all User entities.
     *
     * @Route("/", name="foro_usuario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $this->config['filterType'] = new UserFilterType();
        $response = parent::indexAction();

        return $response;
    }

    /**
     * Creates a new User entity.
     *
     * @Route("/", name="foro_usuario_create")
     * @Method("POST")
     * @Template("SistemaForoBundle:Usuario:new.html.twig")
     */
    public function createAction()
    {
        $this->config['newType'] = new UserType();
        $response = parent::createAction();

        return $response;
    }

    /**
     * Displays a form to create a new User entity.
     *
     * @Route("/new", name="foro_usuario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $this->config['newType'] = new UserType();
        $response = parent::newAction();

        return $response;
    }

    /**
     * Finds and displays a User entity.
     *
     * @Route("/{id}", name="foro_usuario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $response = parent::showAction($id);

        return $response;
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     * @Route("/{id}/edit", name="foro_usuario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $this->config['editType'] = new UserType();
        $response = parent::editAction($id);

        return $response;
    }

    /**
     * Edits an existing User entity.
     *
     * @Route("/{id}", name="foro_usuario_update")
     * @Method("PUT")
     * @Template("MWSimpleForoBundle:Usuario:edit.html.twig")
     */
    public function updateAction($id)
    {
        $this->config['editType'] = new UserType();
        $response = parent::updateAction($id);

        return $response;
    }

    /**
     * Deletes a User entity.
     *
     * @Route("/{id}", name="foro_usuario_delete")
     * @Method("DELETE")
     */
    public function deleteAction($id)
    {
        $response = parent::deleteAction($id);

        return $response;
    }

    /**
     * Exporter User.
     *
     * @Route("/exporter/{format}", name="foro_usuario_export")
     */
    public function getExporter($format)
    {
        $response = parent::exportCsvAction($format);

        return $response;
    }

    /**
     * Autocomplete a User entity.
     *
     * @Route("/autocomplete-forms/get-entrada", name="User_autocomplete_entrada")
     */
    public function getAutocompleteEntrada()
    {
        $options = array(
            'repository' => "MWSimpleForoBundle:Entrada",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a User entity.
     *
     * @Route("/autocomplete-forms/get-grupo", name="User_autocomplete_grupo")
     */
    public function getAutocompleteGrupo()
    {
        $options = array(
            'repository' => "MWSimpleForoBundle:Grupo",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }

    /**
     * Autocomplete a User entity.
     *
     * @Route("/autocomplete-forms/get-respuesta", name="User_autocomplete_respuesta")
     */
    public function getAutocompleteRespuesta()
    {
        $options = array(
            'repository' => "MWSimpleForoBundle:Respuesta",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }
}