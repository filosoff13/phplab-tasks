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
        $this->assertEquals($expected, countArguments(...$input));
    }

    public function positiveDataProvider()
    {
        return [
            [[], ['argument_count' => 0, 'argument_values' => [],]],
            [['test_string'], ['argument_count' => 1, 'argument_values' => ['test_string'],]],
            [['first', 'second'], ['argument_count' => 2, 'argument_values' => ['first', 'second'],]],
         ];
    }

}