<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentTest extends TestCase
{
    public function testPositive($arg, $expected)
    {
        $this->assertEquals($expected, sayHelloArgument($arg));
    }

    public function positiveDataProvider()
    {
        return [
            [0, 'Hello 0'],
            ['test', 'Hello test'],
            [true, 'Hello 1'],
        ];
    }
}