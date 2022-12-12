<?php

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase {

    public function testEmpty() {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * TestPush depende de TestEmpty, el valor retornado por
     * TestEmpty lo recibirá TestPush por parámetro
     * 
     * @depends testEmpty
     */
    public function testPush(array $stack) {
        array_push($stack, 'foo');

        // AssertSame comprueba que los dos valores son iguales y además son del mismo tipo
        $this->assertSame('foo', $stack[count($stack)-1]);

        $this->assertNotEmpty($stack);

        return $stack;
    }

    /**
     * testPop depende de testPush, el valor retornado por
     * testPush lo recibirá testPop por parámetro
     * 
     * @depends testPush
     */
    public function testPop(array $stack) {
        $this->assertSame('foo', array_pop($stack));

        $this->assertEmpty($stack);
    }

}