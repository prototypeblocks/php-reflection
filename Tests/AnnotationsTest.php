<?php
/**
 * Created by PhpStorm.
 * User: perryfaro
 * Date: 01-01-16
 * Time: 19:24
 */
class Annotations extends \PHPUnit_Framework_TestCase {

    protected $testArray = array(
        'verb' =>
        array(
            0 => 'get',
            1 => 'post',
            2 => 'put',
            3 => 'delete',
        ),
        'api' => true,
    );

    public function testClassAnnotation() {
        $annotations = new \Prototypeblocks\Reflection\Annotations;
        $annotation = $annotations->getAnnotations('class', 'testClass');
        $this->assertEquals($this->testArray, $annotation, 'The array is not the expected array');
    }

    public function testMethodAnnotation() {
        $annotations = new \Prototypeblocks\Reflection\Annotations;
        $annotation = $annotations->getAnnotations('method', 'testClass', 'indexAction');
        $this->assertEquals($this->testArray, $annotation, 'The array is not the expected array');
    }

}

/**
 * Below the test class
 */


/**
 * @verb ["get", "post", "put", "delete"]
 * @api true
 */
class testClass {

    /**
     * @verb ["get", "post", "put", "delete"]
     * @api true
     */
    public function indexAction() {
        
    }

}
