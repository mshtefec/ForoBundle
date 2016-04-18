<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\BaseRespuestaRepository;

/**
 * Abstract BaseRespuesta
 *
 * @ORM\MappedSuperclass
 *
 * @author MWS
 */
abstract class BaseRespuesta
{

    /**
     * @var string
     *
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Respuesta
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->entrada = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set miembro
     *
     * @param \FOS\UserBundle\Entity\User $miembro
     * @return Respuesta
     */
    public function setMiembro(\FOS\UserBundle\Entity\User $miembro = null)
    {
        $this->miembro = $miembro;

        return $this;
    }

    /**
     * Get miembro
     *
     * @return \FOS\UserBundle\Entity\User 
     */
    public function getMiembro()
    {
        return $this->miembro;
    }

    /**
     * Add entrada
     *
     * @param \MWSimple\ForoBundle\Entity\Entrada $entrada
     * @return Respuesta
     */
    public function addEntrada(\MWSimple\ForoBundle\Entity\Entrada $entrada)
    {
        $this->entrada[] = $entrada;

        return $this;
    }

    /**
     * Remove entrada
     *
     * @param \MWSimple\ForoBundle\Entity\Entrada $entrada
     */
    public function removeEntrada(\MWSimple\ForoBundle\Entity\Entrada $entrada)
    {
        $this->entrada->removeElement($entrada);
    }

    /**
     * Get entrada
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntrada()
    {
        return $this->entrada;
    }
}
