<?php

namespace MWSimple\Bundle\ForoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * GrupoType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class GrupoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('miembros', 'select2', array(
                'class' => 'MWSimple\Bundle\ForoBundle\Entity\Usuario',
                'url'   => 'Grupo_autocomplete_miembros',
                'configs' => array(
                    'multiple' => true,//required true or false
                    'width'    => 'off',
                ),
                'attr' => array(
                    'class' => "col-lg-12 col-md-12 col-sm-12 col-xs-12",
                )
            ))
            // ->add('entrada', 'select2', array(
            //     'class' => 'MWSimple\Bundle\ForoBundle\Entity\Entrada',
            //     'url'   => 'Grupo_autocomplete_entrada',
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
            'data_class' => 'MWSimple\Bundle\ForoBundle\Entity\Grupo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mws_forobundle_grupo';
    }
}
