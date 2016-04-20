<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\EntradaRepository;

/**
 * Entrada
 *
 * @ORM\Table(name="mws_entrada")
 * @ORM\Entity(repositoryClass="MWSimple\Bundle\ForoBundle\Entity\EntradaRepository")
 */
class Entrada
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
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\ManyToOne(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Usuario", inversedBy="entrada")
     * @ORM\JoinColumn(name="autor_id", referencedColumnName="id")
     */
    private $autor;

    /**
     * @var \MWSimple\Bundle\ForoBundle\Entity\Grupo
     *
     * @ORM\ManyToOne(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grupo_id", referencedColumnName="id")
     * })
     */
    private $grupo;

    /**
     * @ORM\OneToMany(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Respuesta", mappedBy="entrada")
     */
    private $respuestas;

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
