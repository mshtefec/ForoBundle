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
     * Configuration file.
     */
    protected $configEntrada = array(
        'yml' => '/../Resources/config/Entrada.yml',
    );

    protected function getConfigEntrada(){
        $configs = Yaml::parse(file_get_contents(__DIR__ . $this->configEntrada['yml']));
        foreach ($configs as $key => $value) {
            $config[$key] = $value;
        }
        foreach ($this->configEntrada as $key => $value) {
            if ($key != 'yml') {
                $config[$key] = $value;
            }
        }
        return $config;
    }

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
    * Creates a form to create a entity.
    * @param array $config
    * @param $entity The entity
    * @return \Symfony\Component\Form\Form The form
    */
    protected function createCreateForm($config, $entity)
    {
        $form = $this->createForm($config['newType'], $entity, array(
            'action' => $this->generateUrl('foro_mws'),
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
     * Finds and displays a Foro entity.
     *
     * @Route("/{id}", name="traer_foro", options={"expose"=true})
     * @Method("GET")
     */
    public function foroAction(Request $request, $id) {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $foro = $em->getRepository('MWSimpleForoBundle:Grupo')->find($id);  

        $this->configEntrada['newType'] = new EntradaType($id);
        $config = $this->getConfigEntrada();
        
        $entrada = new Entrada();
        $form = $this->createCreateForm($config, $entrada);

        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            ladybug_dump_die("Hola");
            
            /*
            $user = $this->getUser();
            $entity->setAutor($user);
            $entity->setGrupo();
            
            $em->persist($entity);
            $em->flush();
            $this->useACL($entity, 'create');
            
            
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            $nextAction = $this->generateUrl($request->get('_route'));
            //$nextAction = $this->generateUrl('foro_mws');
            //$nextAction = $this->generateUrl('mws_front_foro');

            return $this->redirect($nextAction);
            */
        }

        //$this->entradaCrear();
        // remove the form to return to the view
        unset($config['newType']);
        
        return $this->render('MWSimpleForoBundle:Default:foro.html.twig', array(
            'foro' => $foro,
            'form' => $form->createView(),
        ));
        
    }

    /**
     * Creates a new Entrada entity.
     *
     * @Route("/", name="mws_entrada_crear")
     * @Method("POST")
     * @Template("MWSimpleForoBundle:Entrada:new.html.twig")
     */
    public function entradaCrear()
    {
        $request = $this->getRequest();

        
        $config = $this->getConfigEntrada();
        $config['newType'] = new EntradaType($id);

        $entity = new Entrada();

        ladybug_dump_die("Hola");
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            
        
            /*
            $user = $this->getUser();
            $entity->setAutor($user);
            $entity->setGrupo();
            
            $em->persist($entity);
            $em->flush();
            $this->useACL($entity, 'create');
            */
            
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            //$nextAction = $this->generateUrl('mws_front_foro');

            //return $this->redirect($nextAction);
        } 
        
        $this->get('session')->getFlashBag()->add('danger', 'flash.create.error');
        
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