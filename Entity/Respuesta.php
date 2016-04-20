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
     * @ORM\OneToOne(targetEntity="MWSimple\Bundle\ForoBundle\Entity\User", inversedBy="respuesta")
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
}
