<?php

/**
 * @copyright Copyright (c) 2016 Perry Faro
 * @license MIT
 */

namespace Prototypeblocks\Reflection\Annotations;

interface AnnotationsInterface {

    /**
     * @param string $name
     * @param bool $method
     * @return string
     */
    public function getAnnotation(string $name, $method = false);
}
