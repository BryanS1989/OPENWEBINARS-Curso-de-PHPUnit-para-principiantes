<?php

class ExampleSetUpTearDownTest extends PHPUnit\Framework\TestCase {

    protected $example ;
    protected $empty_array;

    /**
     * This method is called before each test.
     */
    protected function setUp() : void {
        // Asignamos los valores antes de cada test
        $this->example = '1';
        $this->empty_array = array();
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown() : void {
        // Limpiamos las variables después de cada test
        unset($this->example);
        unset($this->empty_array);
    }

    /*
        Las funciones se ejecutan de manera secuencial, por lo 
        que ejecutaremos primero testEmpty y después testEquals, 
        antes de cada uno se ejecutará setUp y después de cada
        uno se ejecutará tearDown
    */

    public function testEmpty() {
        $this->example = '2';
        $this->assertTrue(empty($this->empty_array));
    }

    public function testEquals() {
        $this->assertEquals($this->example, '1');
    }

}