<?php

use PHPUnit\Framework\TestCase;

class SayHelloArgumentWrapperTest extends TestCase
{
    /**
     * @dataProvider positiveDataProvider
     * @param $input
     * @param $expected
     */
    public function testPositive($input, $expected)
    {
        $this->assertEquals($expected, sayHelloArgumentWrapper($input));
    }

    public function positiveDataProvider()
    {
        return [
            [[0, 1], new InvalidArgumentException()],
            [NULL, new InvalidArgumentException()],
            ["https://www.php.net/manual/en/function.get-resource-type.php", new InvalidArgumentException()],
            [new SayHelloArgumentWrapperTest(), new InvalidArgumentException()],
            [call_user_func('my_callback_function') , new InvalidArgumentException()],
        ];
    }
}