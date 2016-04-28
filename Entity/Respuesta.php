<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\RespuestaRepository;

/**
 * Respuesta
 *
 * @ORM\Table(name="mws_respuesta")
 * @ORM\Entity(repositoryClass="MWSimple\Bundle\ForoBundle\Entity\RespuestaRepository")
 */
class Respuesta
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
     * @ORM\Column(name="contenido", type="text")
     */
    private $contenido;

    /**
     * @ORM\OneToOne(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Usuario", inversedBy="respuesta")
     * @ORM\JoinColumn(name="miembro_id", referencedColumnName="id")
     */
    private $miembro;

    /**
     * @ORM\OneToMany(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Entrada", mappedBy="grupo_id")
     * @ORM\JoinTable(name="entrada")
     */
    private $entrada;

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
     * Constructor
     */
    public function __construct()
    {
        $this->entrada = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set miembro
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Usuario $miembro
     * @return Respuesta
     */
    public function setMiembro(\MWSimple\Bundle\ForoBundle\Entity\Usuario $miembro = null)
    {
        $this->miembro = $miembro;

        return $this;
    }

    /**
     * Get miembro
     *
     * @return \MWSimple\Bundle\ForoBundle\Entity\Usuario 
     */
    public function getMiembro()
    {
        return $this->miembro;
    }

    /**
     * Add entrada
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada
     * @return Respuesta
     */
    public function addEntrada(\MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada)
    {
        $this->entrada[] = $entrada;

        return $this;
    }

    /**
     * Remove entrada
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada
     */
    public function removeEntrada(\MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada)
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
