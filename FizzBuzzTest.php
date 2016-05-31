<?php
require './vendor/autoload.php';
require './FizzBuzz.php';

class FizzBuzzTest extends \PHPUnit_Framework_TestCase
{
    public $fizz_buzz;

    public function setUp()
    {
        $this->fizz_buzz = new FizzBuzz();
    }

    public function collectiondataProvider()
    {
        return [
            [
                [1,2,3,4,6,7,9],
                [1, 2, 'Fizz', 4, 'Fizz', 7, 'Fizz']
            ],
            [
                [4,5,7,8,10],
                [4,'Buzz',7,8,'Buzz']
            ],
            [
                [14,15,30,31,45],
                [14, 'FizzBuzz', 'FizzBuzz', 31,'FizzBuzz']
            ]
        ];
    }

    /**
     * @test
     * @dataProvider collectiondataProvider
     */
    public function transformsCollectionsCorrectly($collection, $expected)
    {
        $result = $this->fizz_buzz->process($collection);
        $this->assertEquals(
            $expected,
            $result,
            "FizzBuzz did not correctly transform values"
        );
    }



}