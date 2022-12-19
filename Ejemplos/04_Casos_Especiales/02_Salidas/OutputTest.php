<?php

use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase {

    protected $regex = '/divide by zero$/' ;

    public function testExpectFooActualFoo() {
        /*
        $this->expectOutputString('fool');

            1) OutputTest::testExpectFooActualFoo
                Failed asserting that two strings are equal.
                --- Expected
                +++ Actual
                @@ @@
                -'fool'
                +'foo'

        */
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectBarActualBaz() {
        /*

        $this->expectOutputString('baz');

        2) OutputTest::testExpectBarActualBaz       
            Failed asserting that two strings are equal.
            --- Expected
            +++ Actual
            @@ @@
            -'baz'
            +'bar'
        */

        $this->expectOutputString('bar');
        print 'bar';
    }

    public function testExpectRegex() {
        $this->expectOutputRegex($this->regex);
        echo "divide by zero";
    }

}