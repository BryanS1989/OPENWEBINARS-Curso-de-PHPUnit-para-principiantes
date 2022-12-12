<?php

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase {

    /**
     * La anotacion dataProvider indicará que la función
     * testAdd recibirá los parametros del proveedor de datos,
     * en este caso 'additionalProvider'
     * @dataProvider additionalProvider
     */
    public function testAdd($a, $b, $expected) {
        $this->assertSame($expected, $a + $b);
    }

    /**
     * Este método es el proveedor de datos,
     * se ejecutará antes del SetUp
     * y antes del SetUpBeforeClass
     */
    public function additionalProvider() {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2]
            //[1, 1, 3] --> 1) DataTest::testAdd with data set #3 (1, 1, 3)
        ];
    }

}