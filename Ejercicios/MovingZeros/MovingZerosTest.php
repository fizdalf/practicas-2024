<?php

namespace Ejercicios\MovingZeros;

use PHPUnit\Framework\TestCase;

require __DIR__.'/MovingZeros.php';

class MovingZerosTest extends TestCase
{
    public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray()
    {
        $this->assertSame([],MovingZeros::moveZeros([]));
    }
    public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray1()
    {
        $this->assertSame([false,1,1,2,1,3,"a",0,0],MovingZeros::moveZeros([false,1,0,1,2,0,1,3,"a"]));
    }

//    public function testShouldReturn()
//    {
//
//    }
}
