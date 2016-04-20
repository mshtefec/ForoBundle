<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\UsuarioRepository;

/**
 * User
 *
 * @ORM\Table(name="mws_usuario")
 * @ORM\Entity(repositoryClass="MWSimple\Bundle\ForoBundle\Entity\UsuarioRepository")
 */
class Usuario
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
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     */
    private $userId;

    /**
     * @ORM\OneToOne(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Entrada", inversedBy="autor")
     * @ORM\JoinColumn(name="entrada_id", referencedColumnName="id")
     */
    private $entrada;

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
     * @ORM\OneToOne(targetEntity="MWSimple\Bundle\ForoBundle\Entity\Respuesta", inversedBy="miembro")
     * @ORM\JoinColumn(name="respuesta_id", referencedColumnName="id")
     */
    private $respuesta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isEditor", type="boolean")
     */
    private $isEditor;

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
     * Set userId
     *
     * @param integer $userId
     * @return User
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }
}
