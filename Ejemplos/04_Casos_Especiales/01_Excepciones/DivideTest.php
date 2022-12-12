<?php

use PHPUnit\Framework\TestCase;

require_once('Divide.php');

class DivideTest extends TestCase {

    protected Divide $divideObj ;

    /**
     * This method is called before each test.
     */
    protected function setUp() : void {
        $this->divideObj = new Divide();
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown() : void {
        unset($this->divideObj);
    }

    public function test_divide() {
        // Comprobamos que el test funciona correctamente (4 / 2 = 2)
        $this->assertSame(2, $this->divideObj->divide_func(4, 2));

        /*
            Indicamos a PHPUnit que a partir de aquí esperamos una
            excepción, con código 100, que tenga el mensaje "cannot divi..."
            y que cumpla la expresión regular
        */
        $this->expectException("Exception");
        $this->expectExceptionCode(100);
        $this->expectExceptionMessage("Cannot divide by zero");
        $this->getExpectedExceptionMessageRegExp('/divide by zero$/');

        $this->divideObj->divide_func(4, 0);
        $this->assertSame(0, 1);    // --> no se ejecutará
    }


}