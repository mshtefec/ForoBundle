<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\BaseEntradaRepository;

/**
 * Abstract BaseEntrada
 *
 * @ORM\MappedSuperclass
 *
 * @author MWS
 */
abstract class BaseEntrada
{

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

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
     * Set titulo
     *
     * @param string $titulo
     * @return Entrada
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->respuestas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set autor
     *
     * @param \FOS\UserBundle\Entity\User $autor
     * @return Entrada
     */
    public function setAutor(\FOS\UserBundle\Entity\User $autor = null)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return \FOS\UserBundle\Entity\User 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set grupo
     *
     * @param \MWSimple\ForoBundle\Entity\Grupo $grupo
     * @return Entrada
     */
    public function setGrupo(\MWSimple\ForoBundle\Entity\Grupo $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \MWSimple\ForoBundle\Entity\Grupo 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Add respuestas
     *
     * @param \MWSimple\ForoBundle\Entity\Respuesta $respuestas
     * @return Entrada
     */
    public function addRespuesta(\MWSimple\ForoBundle\Entity\Respuesta $respuestas)
    {
        $this->respuestas[] = $respuestas;

        return $this;
    }

    /**
     * Remove respuestas
     *
     * @param \MWSimple\ForoBundle\Entity\Respuesta $respuestas
     */
    public function removeRespuesta(\MWSimple\ForoBundle\Entity\Respuesta $respuestas)
    {
        $this->respuestas->removeElement($respuestas);
    }

    /**
     * Get respuestas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }
}
