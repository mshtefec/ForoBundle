<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\RespuestaRepository;
use MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface;

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
     * @ORM\OneToOne(targetEntity="MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface")
     * @ORM\JoinColumn(name="miembro_id", referencedColumnName="id")
     */
    private $miembro;

    /**
     * @var \MWSimple\Bundle\ForoBundle\Entity\Entrada
     *
     * @ORM\ManyToOne(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Entrada", inversedBy="respuestas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entrada_Id", referencedColumnName="id")
     * })
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

    public function __toString()
    {
        return $this->getId();
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
     * @param \MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface $miembro
     * @return Respuesta
     */
    public function setMiembro(\MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface $miembro = null)
    {
        $this->miembro = $miembro;

        return $this;
    }

    /**
     * Get miembro
     *
     * @return \MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface 
     */
    public function getMiembro()
    {
        return $this->miembro;
    }

    /**
     * Set entrada
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada
     * @return Respuesta
     */
    public function setEntrada(\MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada = null)
    {
        $this->entrada = $entrada;

        return $this;
    }

    /**
     * Get entrada
     *
     * @return \MWSimple\Bundle\ForoBundle\Entity\Entrada 
     */
    public function getEntrada()
    {
        return $this->entrada;
    }
}
