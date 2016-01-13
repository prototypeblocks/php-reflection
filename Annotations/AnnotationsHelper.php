<?php

/**
 * @copyright Copyright (c) 2016 Perry Faro
 * @license MIT
 */

namespace Prototypeblocks\Reflection\Annotations;

class AnnotationsHelper {

    /**
     * @var string
     */
    private $keyPattern = "[A-z0-9\_\-]+";

    /**
     * @var string
     */
    private $endPattern = "[ ]*(?:@|\r\n|\n)";

    /**
     * @param string $doc
     * @return mixed
     */
    public function parse(string $doc) {
        $annotationsOptions = array();
        $pattern = "/@(?=(.*)" . $this->endPattern . ")/U";
        preg_match_all($pattern, $doc, $matches);
        foreach ($matches[1] as $rawParameter) {
            if (preg_match("/^(" . $this->keyPattern . ") (.*)$/", $rawParameter, $match)) {
                $parsedValue = $this->parseValue($match[2]);
                if (isset($annotationsOptions[$match[1]])) {
                    $annotationsOptions[$match[1]] = array_merge((array) $annotationsOptions[$match[1]], (array) $parsedValue);
                } else {
                    $annotationsOptions[$match[1]] = $parsedValue;
                }
            } else if (preg_match("/^" . $this->keyPattern . "$/", $rawParameter, $match)) {
                $annotationsOptions[$rawParameter] = TRUE;
            } else {
                $annotationsOptions[$rawParameter] = NULL;
            }
        }

        return $annotationsOptions;
    }

    /**
     * @param $originalValue
     * @return mixed|null
     */
    private function parseValue($originalValue) {
        if ($originalValue && $originalValue !== 'null') {
            // try to json decode, if cannot then store as string
            if (($json = json_decode($originalValue, TRUE)) === NULL) {
                $value = $originalValue;
            } else {
                $value = $json;
            }
        } else {
            $value = NULL;
        }
        return $value;
    }

}
