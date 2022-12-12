<?php

class ExampleSetUpBeforeClassTearDownAfterClassTest extends PHPUnit\Framework\TestCase {

    protected static $db;

    protected $example ;
    protected $empty_array;

    /**
    * This method is called before the first test of this test class is run.
    */
    public static function setUpBeforeClass() :void {
        // Esta función se llamará una única vez antes del primer test
        // self::$db = new PDO('sqlite::memory');
    }

    public static function tearDownAfterClass() :void {
        // Esta función se llamará una única vez después del último test
        //self::$db = null;
    }

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