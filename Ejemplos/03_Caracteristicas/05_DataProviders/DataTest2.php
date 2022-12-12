<?php

use PHPUnit\Framework\TestCase;

class DataTest2 extends TestCase {

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
        /*
            Ponemos clave con una descripción de los datos
            ya que de esta manera en la descripción del error
            tendremos el elemento que ha fallado descrito por 
            la descripción indicada
        */
        return [
            'Adding zeros' => [0, 0, 0],
            'Zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one' => [1, 1, 2]
            // 'one plus one' => [1, 1, 3]  --> 1) DataTest2::testAdd with data set "one plus one" (1, 1, 3)
        ];
    }

}