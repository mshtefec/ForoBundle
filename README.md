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
new MWSimple\Bundle\ForoBundle\MWSimpleForoBundle(),
```

## Configure Entities

#### Implements Interface FosUserSubjectInterface in YOU UserFos Entity
```php
...
// DON'T forget this use statement!!!
use MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface;
...
class User extends BaseUser implements FosUserSubjectInterface  {
    ...
    ...
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->username;
    }

    ...
    ...
}
```

## Configure your config.yml
```yaml

imports:
    # ForoBundle services
    - { resource: "@MWSimpleForoBundle/Resources/config/services.yml" }

    ...
    ...

parameters:
    # entity referenced to FosUserSubjectInterface
    subjectInterface: Sistema\UserBundle\Entity\User

    ...
    ...

# Doctrine Configuration
doctrine:
    orm:
        auto_mapping: true
        # resolve_target attach to the subject entity for other thirds entities 
        resolve_target_entities:
            # configuration of the parameters attach fos
            MWSimple\Bundle\ForoBundle\Model\FosUserSubjectInterface: "%subjectInterface%"

    ...
    ...
```

## Configure your own routings with the forobundle dynamically for yours own purposes in routing.yml
#### EXAMPLES
```yaml

# all routes from forobundle
mw_simple_front:
    resource: "@MWSimpleForoBundle/Controller/"
    type:     annotation
    prefix:   /foro

# one route especific in this case DefaultController Index
front_foro:
    path: /mws_front_foro/
    defaults:
        _controller: MWSimpleForoBundle:Default:index
        template:    index.html.twig

# other route especific only for the foro groups create with security own, show GrupoController Index
admin_foro_grupo:
    path: /admin/foro/grupo
    defaults:
        _controller: MWSimpleForoBundle:Grupo:index
        template:    index.html.twig

    ...
    ...
```

### Importing yours controllers RENDERS, example front_foro view
#### in this case is the Front view of ForoBundle
```twig
    {# corresponds to the configurations in yours routing.yml #}
    {{ render(url('front_foro')) }}
```