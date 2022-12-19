<?php

use PHPUnit\Framework\TestCase;

require_once('Divide.php');

class AnotationsTest extends TestCase {

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

    /*
        Usando @group podemos lanzar los test de un grupo en concreto usando:
            --group grupo_1
    */
    /**
     * @after                               <-- indica que se ejecutará después de todas las pruebas unitarias
     * @group grupo_1                       <-- indica el grupo al que pertenece esta función
     */
    public function test_after() {
        $this->assertSame(1, 1);
    }

    /**
     * @author Bryan
     * @group grupo_1
     */
    public function test_author() {
        $this->assertSame(1, 1);
    }

    /**
     * @before                              <-- indica que se ejecutará antes que todas las pruebas unitarias
     * @group grupo_1                       <-- indica el grupo al que pertenece esta función
     */
    public function test_before() {
        $this->assertSame(1, 1);
    }

    /**
     * @cover Divide::divide_func           <-- indica la función y clase que cubre esta prueba unitaria (útil para informes de cobertura de código)
     * @uses DivideTest                     <-- Parecida a covers, pero en este caso nos indica qué clase está utilizando el test
     * @expectedException Exception         <-- indica que se espera que la función test_divide lance una excepción de tipo 'Exception'
     */
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

    /**
     * @dataProvider additionalProvider     <-- indica que testAdd usará additionalProvider como data provider
     */
    public function testAdd($a, $b, $expected) {
        $this->assertSame($expected, $a + $b);
    }

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

    public function testEmpty() {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty                   <-- indica que testPush depende de testEmpty
     */
    public function testPush(array $stack) {
        array_push($stack, 'foo');

        // AssertSame comprueba que los dos valores son iguales y además son del mismo tipo
        $this->assertSame('foo', $stack[count($stack)-1]);
        $this->assertNotEmpty($stack);

        return $stack;
    }

    /** 
     * @test                                <-- indica que aunque la función no comience con 'test' sí se trata de un test
     */
    public function same() {
        $this->assertEquals(1, 0);
    }

    /**
     * @param string    $input              
     * @param int       $expectedLength
     * 
     * @testWith        ["test", 4]         <-- parecido a dataProvider pero los datos no provienen de una función si no que los obtenemos de la documentación del test unitario
     *                  ["longer-string", 13]
     */
    public function testStringLength (string $input, int $expectedLength) {
        $this->assertSame($expectedLength, strlen($input));
    }


}