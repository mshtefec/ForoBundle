# ForoBundle

## Objetivos
- Proveer de un foro de debates.
- Usuario editor, podrá crear grupos y cada grupo tener editor/es de grupo, los editores de grupo pueden incluir miembros.
- Pueden crear debates los editores del grupo y los miembros incluidos en el grupo.
- Los editores o miembros del grupo pueden responder al debate.

## Author

Gonzalo Alonso - gonkpo@gmail.com

## Collaborators

Max Shtefec - max.shtefec@gmail.com

## Installation

### Using composer

Add following lines to your `composer.json` file:

### Support Symfony 2.7.* + Include Boostrap 3

```json
"require": {
    ...
    "mwsimple/foro": "1.0.*@dev",
}
```

Execute:

```cli
php composer.phar update "mwsimple/foro"
```

Add it to the `AppKernel.php` class:

```php
// ...
new MWSimple\Bundle\ForoBundle\ForoBundle(),
```

## Configure Entities

#### Entrada Entity
```php
...
use MWSimple\Bundle\ForoBundle\Entity\BaseEntrada;
...
class Entrada extends BaseEntrada {
    ...
    /**
     * @ORM\OneToOne(targetEntity="FOS\UserBundle\Entity\User", inversedBy="username")
     * @ORM\JoinColumn(name="autor_id", referencedColumnName="id")
     */
    private $autor;
    
    /**
     * @var \MWSimple\ForoBundle\Entity\Grupo
     *
     * @ORM\ManyToOne(targetEntity="MWSimple\ForoBundle\Entity\Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grupo_id", referencedColumnName="id")
     * })
     */
    private $grupo;

    /**
     * @ORM\OneToMany(targetEntity="MWSimple\ForoBundle\Entity\Respuesta", mappedBy="entrada")
     */
    private $respuestas;
    ...
}
```
#### Respuesta Entity
```php
...
use MWSimple\Bundle\ForoBundle\Entity\BaseRespuesta;
...
class Respuesta extends BaseRespuesta {
    ...
    /**
     * @ORM\OneToOne(targetEntity="FOS\UserBundle\Entity\User", inversedBy="username")
     * @ORM\JoinColumn(name="miembro_id", referencedColumnName="id")
     */
    private $miembro;

    /**
     * @ORM\OneToMany(targetEntity="MWSimple\ForoBundle\Entity\Entrada", mappedBy="grupo_id")
     * @ORM\JoinTable(name="entrada")
     */
    private $entrada;
    ...
}
```
#### Grupo Entity
```php
...
use MWSimple\Bundle\ForoBundle\Entity\BaseGrupo;
...
class Grupo extends BaseGrupo {
    ...
    /**
     * @ORM\OneToMany(targetEntity="FOS\UserBundle\Entity\User", mappedBy="username")
     * @ORM\JoinTable(name="miembro_editoruser")
     */
    private $miembros;

    /**
     * @ORM\OneToMany(targetEntity="MWSimple\ForoBundle\Entity\Entrada", mappedBy="grupo_id")
     * @ORM\JoinTable(name="entrada")
     */
    private $entrada;
    ...
}
```
