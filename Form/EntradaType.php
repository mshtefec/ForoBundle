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
        return 'sistema_forobundle_entrada';
    }
}
