<?php

/**
 * @copyright Copyright (c) 2016 Perry Faro
 * @license MIT
 */

namespace Prototypeblocks\Reflection\Annotations;

use Prototypeblocks\Reflection\Annotations\AnnotationClass;
use Prototypeblocks\Reflection\Annotations\AnnotationMethod;

class AnnotationsFactory {

    /**
     * @param string $type
     * @return \RestFul\Reflection\Annotations\AnnotationsInterface
     */
    public static function get(string $type) {
        switch ($type) {
            case 'method' :
                return new AnnotationMethod;
            case 'class' :
                return new AnnotationClass;
            case 'function' :
                return new AnnotationFunction;
            case 'property' :
                return new AnnotationProperty;
        }
    }

}
