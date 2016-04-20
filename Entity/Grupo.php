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
     * @ORM\OneToMany(targetEntity="MWSimple\Bundle\ForoBundle\Entity\User", mappedBy="grupoId")
     * @ORM\JoinTable(name="miembros")
     */
    private $miembros;

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
