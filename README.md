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

