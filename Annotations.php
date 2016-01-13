<?php

/**
 * @copyright Copyright (c) 2016 Perry Faro
 * @license MIT
 */

namespace Prototypeblocks\Reflection;

use Prototypeblocks\Reflection\Annotations\AnnotationsFactory;
use Prototypeblocks\Reflection\Annotations\AnnotationsHelper;

class Annotations extends AnnotationsHelper {

    /**
     * @param string $type
     * @param string $object
     * @param bool $name
     * @return string
     */
    public function getAnnotations(string $type, string $object, $name = false) {
        $annotation = AnnotationsFactory::get($type);
        $doc = $annotation->getAnnotation($object, $name);
        return $this->parse($doc);
    }

}
