<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\GrupoRepository;

/**
 * Grupo
 *
 * @ORM\Table(name="mws_grupo")
 * @ORM\Entity(repositoryClass="MWSimple\Bundle\ForoBundle\Entity\GrupoRepository")
 */
class Grupo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Usuario", mappedBy="grupoId")
     * @ORM\JoinTable(name="miembros")
     */
    private $miembros;

    /**
     * @ORM\OneToMany(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Entrada", mappedBy="grupo_id")
     * @ORM\JoinTable(name="entradas")
     */
    private $entradas;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getNombre();
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
     * Set nombre
     *
     * @param string $nombre
     * @return nombre
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
     * Add miembros
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Usuario $miembros
     * @return usuario
     */
    public function addMiembro(\MWSimple\Bundle\ForoBundle\Entity\Usuario $miembros)
    {
        $this->miembros[] = $miembros;

        return $this;
    }

    /**
     * Remove miembros
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Usuario $miembros
     */
    public function removeMiembro(\MWSimple\Bundle\ForoBundle\Entity\Usuario $miembros)
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
     * @param \MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada
     * @return entrada
     */
    public function addEntradas(\MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada)
    {
        $this->entrada[] = $entrada;

        return $this;
    }

    /**
     * Remove entrada
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada
     */
    public function removeEntradas(\MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada)
    {
        $this->entrada->removeElement($entrada);
    }

    /**
     * Get entrada
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntradas()
    {
        return $this->entrada;
    }
}
