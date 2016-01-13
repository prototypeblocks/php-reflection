Reflection
==========

```
use Prototypeblocks\Reflection\Annotations;

$annotations = new Annotations;
$annotation = $annotations->getAnnotations('method', 'testClass', 'indexAction');

print_r($annotation);
```

You can run the unit tests with the following command:

    $ cd path/to/Prototypeblocks/Reflection/
    $ composer install
    $ phpunit