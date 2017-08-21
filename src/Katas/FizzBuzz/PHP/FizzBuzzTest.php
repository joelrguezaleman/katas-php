<?php

namespace Katas\FizzBuzz\PHP;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private $fizzBuzz;

    public function setUp()
    {
        parent::setUp();

        $this->fizzBuzz = new FizzBuzz();
    }

    public function tearDown()
    {
        unset($this->fizzBuzz);

        parent::tearDown();
    }

    /**
     * @expectedException TypeError
     */
    public function testItThrowsAnExceptionIfWeDoNotPassAnyParametersToTheGetMethod()
    {
        $this->fizzBuzz->get();
    }

    /**
     * @dataProvider numberProvider
     */
    public function testItReturnsTheCorrectResultDependingOnTheNumber(
        int $number,
        string $expectedResult
    ) {
        $result = $this->fizzBuzz->get($number);

        self::assertEquals($expectedResult, $result);
    }

    public function numberProvider()
    {
        return [
            [1, '1'],
            [2, '2'],
            [3, 'Fizz'],
            [4, '4'],
            [5, 'Buzz'],
            [6, 'Fizz'],
            [7, '7'],
            [8, '8'],
            [9, 'Fizz'],
            [10, 'Buzz'],
            [11, '11'],
            [12, 'Fizz'],
            [13, 'Fizz'],
            [14, '14'],
            [15, 'FizzBuzz'],
            [16, '16'],
            [17, '17'],
            [18, 'Fizz'],
            [19, '19'],
            [20, 'Buzz'],
            [21, 'Fizz'],
            [22, '22'],
            [23, 'Fizz'],
            [24, 'Fizz'],
            [25, 'Buzz'],
            [26, '26'],
            [27, 'Fizz'],
            [28, '28'],
            [29, '29'],
            [30, 'FizzBuzz'],
            [52, 'Buzz'],
        ];
    }
}
