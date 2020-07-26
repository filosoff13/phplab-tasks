<?php

use PHPUnit\Framework\TestCase;

class CountArgumentsTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, countArguments($input));
    }

    public function positiveDataProvider()
    {
        return [
            ['test_string', ['argument_count' => 1, 'argument_values' => ['test_string']]],
         ];
    }

//    /**
//     * @dataProvider positiveDataProvider1
//     * @param $input1
//     * @param $input2
//     * @param $expected
//     */
//    public function testPositiveTwo($input1, $input2, $expected)
//    {
//        $this->assertEquals($expected, countArguments($input1, $input2));
//    }
//
//    public function positiveDataProvider1()
//    {
//        return [
//            ['test_string', ['argument_count' => 1, 'argument_values' => ['test_string']]],
//        ];
//    }
}