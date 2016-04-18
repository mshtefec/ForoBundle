<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\BaseGrupoRepository;

/**
 * Abstract BaseGrupo
 *
 * @ORM\MappedSuperclass
 *
 * @author MWS
 */
abstract class BaseGrupo
{

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

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
     * Set nombre
     *
     * @param string $nombre
     * @return Grupo
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->miembros = new \Doctrine\Common\Collections\ArrayCollection();
        $this->entrada = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add miembros
     *
     * @param \FOS\UserBundle\Entity\User $miembros
     * @return Grupo
     */
    public function addMiembro(\FOS\UserBundle\Entity\User $miembros)
    {
        $this->miembros[] = $miembros;

        return $this;
    }

    /**
     * Remove miembros
     *
     * @param \FOS\UserBundle\Entity\User $miembros
     */
    public function removeMiembro(\FOS\UserBundle\Entity\User $miembros)
    {
        $this->miembros->removeElement($miembros);
    }

    /**
     * Get miembros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMiembros()
    {
        return $this->miembros;
    }

    /**
     * Add entrada
     *
     * @param \MWSimple\ForoBundle\Entity\Entrada $entrada
     * @return Grupo
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
