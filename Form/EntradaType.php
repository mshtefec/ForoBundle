<?php

namespace MWSimple\Bundle\ForoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * EntradaType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class EntradaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', null, array(
                'attr' => array(
                    'class'       => "form-control",
                    'placeholder' => "Bienvenido a la nueva Entrada (Titulo de Ejemplo)",
                )
            ))
            // ->add('idForo', 'hidden', array(
            //     'mapped' => false,
            //     'data'   => $this->idForo,
            // ))
            // ->add('autor', 'select2', array(
            //     'class' => 'MWSimple\Bundle\ForoBundle\Entity\Usuario',
            //     'url'   => 'Entrada_autocomplete_autor',
            //     'configs' => array(
            //         'multiple' => false,//required true or false
            //         'width'    => 'off',
            //     ),
            //     'attr' => array(
            //         'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
            //     )
            // ))
            // ->add('grupo', 'select2', array(
            //     'label' => "Foro",
            //     'class' => 'MWSimple\Bundle\ForoBundle\Entity\Grupo',
            //     'url'   => 'Entrada_autocomplete_grupo',
            //     'configs' => array(
            //         'multiple' => false,//required true or false
            //         'width'    => 'off',
            //     ),
            //     'attr' => array(
            //         'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
            //     )
            // ))
            // ->add('respuestas', 'select2', array(
            //     'class' => 'MWSimple\Bundle\ForoBundle\Entity\Respuesta',
            //     'url'   => 'Entrada_autocomplete_respuestas',
            //     'configs' => array(
            //         'multiple' => true,//required true or false
            //         'width'    => 'off',
            //     ),
            //     'attr' => array(
            //         'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
            //     )
            // ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MWSimple\Bundle\ForoBundle\Entity\Entrada'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mws_forobundle_entrada';
    }
}
