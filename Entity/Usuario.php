<?php

namespace MWSimple\Bundle\ForoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MWSimple\Bundle\ForoBundle\Entity\UsuarioRepository;
use MWSimple\Bundle\ForoBundle\Model\InvoiceSubjectInterface;

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

    /*
     * @var integer
     *
     * @ORM\Column(name="userId", type="integer")
     *
    private $userId;
    */
    
    /**
     * @ORM\ManyToOne(targetEntity="MWSimple\Bundle\ForoBundle\Model\InvoiceSubjectInterface")
     * @var InvoiceSubjectInterface
     */
    protected $userId;

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

    public function __toString()
    {
        return $this->getUserId();
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return test
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

    /**
     * Set isEditor
     *
     * @param boolean $isEditor
     * @return test
     */
    public function setIsEditor($isEditor)
    {
        $this->isEditor = $isEditor;

        return $this;
    }

    /**
     * Get isEditor
     *
     * @return boolean 
     */
    public function getIsEditor()
    {
        return $this->isEditor;
    }

    /**
     * Set entrada
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Entrada $entrada
     * @return test
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

    /**
     * Set grupo
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Grupo $grupo
     * @return test
     */
    public function setGrupo(\MWSimple\Bundle\ForoBundle\Entity\Grupo $grupo = null)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return \MWSimple\Bundle\ForoBundle\Entity\Grupo 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set respuesta
     *
     * @param \MWSimple\Bundle\ForoBundle\Entity\Respuesta $respuesta
     * @return test
     */
    public function setRespuesta(\MWSimple\Bundle\ForoBundle\Entity\Respuesta $respuesta = null)
    {
        $this->respuesta = $respuesta;

        return $this;
    }

    /**
     * Get respuesta
     *
     * @return \MWSimple\Bundle\ForoBundle\Entity\Respuesta 
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }
}
