<?php

/**
 * @copyright Copyright (c) 2016 Perry Faro
 * @license MIT
 */

namespace Prototypeblocks\Reflection\Annotations;

use Prototypeblocks\Reflection\Annotations\AnnotationsInterface;

class AnnotationMethod implements AnnotationsInterface {

    /**
     * @param string $name
     * @param bool $method
     * @return string
     */
    public function getAnnotation(string $name, $method = false) {
        $r = new \ReflectionMethod($name, $method);
        return $r->getDocComment();
    }

}
