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
     * @Template("MWSimpleForoBundle:Respuesta:new.html.twig")
     */
    public function createAction()
    {
        $config = $this->getConfig();
        $request = $this->getRequest();
        $entity = new $config['entity']();
        $form   = $this->createCreateForm($config, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->useACL($entity, 'create');

            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            if (!array_key_exists('saveAndAdd', $config)) {
                $config['saveAndAdd'] = true;
            } elseif ($config['saveAndAdd'] != false) {
                $config['saveAndAdd'] = true;
            }

            if ($config['saveAndAdd']) {
                $nextAction = $form->get('saveAndAdd')->isClicked()
                ? $this->generateUrl($config['new'])
                : $this->generateUrl($config['show'], array('id' => $entity->getId()));
            } else {
                $nextAction = $this->generateUrl('foro_mws');
            }

            return $this->redirect($nextAction);
        }

        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');

        // remove the form to return to the view
        unset($config['newType']);

        return array(
            'config' => $config,
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a entity.
    * @param array $config
    * @param $entity The entity
    * @return \Symfony\Component\Form\Form The form
    */
    protected function createCreateForm($config, $entity)
    {
        $form = $this->createForm($config['newType'], $entity, array(
            'action' => $this->generateUrl($config['create']),
            'method' => 'POST',
        ));

        $form
            ->add('save', 'submit', array(
                'translation_domain' => 'MWSimpleAdminCrudBundle',
                'label'              => 'publicar',
                'attr'               => array(
                    'class' => 'form-control btn-success',
                    'col'   => 'col-lg-2',
                )
            ))
        ;

        if (!array_key_exists('saveAndAdd', $config)) {
            $config['saveAndAdd'] = true;
        } elseif ($config['saveAndAdd'] != false) {
            $config['saveAndAdd'] = true;
        }

        if ($config['saveAndAdd']) {
            $form
                ->add('saveAndAdd', 'submit', array(
                    'translation_domain' => 'MWSimpleAdminCrudBundle',
                    'label'              => 'views.new.saveAndAdd',
                    'attr'               => array(
                        'class' => 'form-control btn-primary',
                        'col'   => 'col-lg-3',
                    )
                ))
            ;
        }

        return $form;
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
            'repository' => "MWSimpleForoBundle:Usuario",
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
            'repository' => "MWSimpleForoBundle:Entrada",
            'field'      => "id",
        );
        $response = parent::getAutocompleteFormsMwsAction($options);

        return $response;
    }
}