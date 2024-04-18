<?php

namespace Ejercicios\SimpleConsecutive;

require __DIR__.'/SimpleConsecutive.php';

namespace Ejercicios\SimpleConsecutive;

use PHPUnit\Framework\TestCase;

class SimpleConsecutiveTest extends TestCase
{


    public function testShouldReturnAZeroWhenThereIsOnlyOneElement()
    {
        $this->assertEquals(0, SimpleConsecutive::par([1]));
    }

    public function testShouldReturnAOneWhenThereIsOneConsecutivePair()
    {
        $this->assertEquals(1, SimpleConsecutive::par([4,5]));
    }

    public function testShouldReturnZeroWhenThereAreTwoElementsNoConsecutivePair()
    {
        $this->assertEquals(0, SimpleConsecutive::par([1,3]));
    }

    public function testShouldReturnZeroWhenThereAreTwoElementsNoConsecutivePair2()
    {
        $this->assertEquals(0, SimpleConsecutive::par([4,6]));
    }

    public function testShouldReturnOneWhenThereAreTwoElementsConsecutivePair()
    {
        $this->assertEquals(1, SimpleConsecutive::par([1,2]));
    }

    public function testShouldReturnOneWhenThereAreTwoElementsDescendingConsecutivePair()
    {
        $this->assertEquals(1, SimpleConsecutive::par([7,6]));
    }

    public function testShouldReturnOneWhenThereAreThreeElementsConsecutivePair()
    {
        $this->assertEquals(1, SimpleConsecutive::par([3,4,9]));
    }

    public function testShouldReturnZeroWhenThereAreThreeElementsNoConsecutivePair()
    {
        $this->assertEquals(0, SimpleConsecutive::par([1,5,9]));
    }

    public function testShouldReturnTwoWhenThereAreFourElementsAndTwoConsecutivePair()
    {
        $this->assertEquals(2, SimpleConsecutive::par([1,2,4,5]));
    }

    public function testShouldReturnOneWhenThereAreFourElementsAndOneConsecutivePair()
    {
        $this->assertEquals(1, SimpleConsecutive::par([1,2,5,5]));
    }

    public function testShouldReturnZeroWhenThereAreFiveElementsAndNoConsecutivePair()
    {
        $this->assertEquals(0, SimpleConsecutive::par([1,3,5,5,7]));
    }

    public function testShouldReturnOneWhenThereAreFiveElementsAndOneConsecutivePair()
    {
        $this->assertEquals(1, SimpleConsecutive::par([0,2,4,5,7]));
    }

    public function testShouldReturnOneWhenThereAreSixElementsAndOneConsecutivePair()
    {
        $this->assertEquals(1, SimpleConsecutive::par([0,2,5,5,7,8]));
    }

    public function testShouldReturnOneWhenThereAreSixElementAndOneConsecutivePair2()
    {
        $this->assertEquals(4, SimpleConsecutive::par([-55, -56, -7, -6, 56, 55, 63, 62]));
    }
}



