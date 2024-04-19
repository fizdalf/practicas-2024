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

    public function testShouldReturnTheSameArrayWhenItReceivesAnUnexpectedArray()
    {
        $this->assertSame([1],MovingZeros::moveZeros([1]));
    }

    public function testShouldReturnAnArrayWithZeroWhenItReceivesAnEmptyArrayWithZero()
    {
        $this->assertSame([0], MovingZeros::moveZeros([0]));
    }

    public function testShouldReturnAZeroWhenItReceivesAnArrayWithTwoIntElements()
    {
        $this->assertSame([1,0], MovingZeros::moveZeros([0,1]));

    }
    public function testShouldReturnASameArrayWhenItReceivesAnArrayWithoutZero()
    {
        $this->assertSame(["a","b"], MovingZeros::moveZeros(["a","b"]));
    }
    public function testShouldReturnAnOrderArrayWhenItReceivesAnRandomWithThreeElements()
    {
        $this->assertSame(["a",1,0], MovingZeros::moveZeros([0,"a",1]));
    }

    public function testShouldReturnAnArrayWithZeroAtTheEndWhenItReceivesARandomArray()
    {
        $this->assertSame([4.2,7.2,1,"A",0], MovingZeros::moveZeros([4.2,7.2,1,0,"A"]));
    }

    public function testShouldReturnAnArrayWithZeroAtTheEndWhenItReceivesAnArrayWithMultipleTypeOfData()
    {
        $this->assertSame([false,1,1,2,1.3,"a",0,0],MovingZeros::moveZeros([false,1,0,1,2,0,1.3,"a"]));
    }
 public function testShouldReturnAOrderArrayWhenItReceivesADisorderArray()
    {
        $this->assertSame(["a","b","c","d",1,1,3,1,9,9,0,0,0,0,0,0,0,0,0,0],
            MovingZeros::moveZeros(["a",0,0,"b","c","d",0,1,0,1,0,3,0,1,9,0,0,0,0,9]));
    }
 public function testShouldReturnAnOrderArrayWhenItReceivesAnDisorderArrayWithMultipleTypesOfData()
    {
        $this->assertSame(["a","b",null,"c","d",1,false,1,3,[],1,9,9,0,0,0,0,0,0,0,0,0,0],
            MovingZeros::moveZeros(["a",0,0,"b",null,"c","d",0,1,false,0,1,0,3,[],0,1,9,0,0,0,0,9])
        );
    }
 public function testShouldReturnAnArrayWithAZeroAtTheEndWhenItReceivesARandomArray()
    {
        $this->assertSame([1,null,2,false,1,0,0], MovingZeros::moveZeros([0,1,null,2,false,1,0]));
    }

     public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray6()
    {
        $this->assertSame([9,9,1,2,1,1,3,1,9,9,0,0,0,0,0,0,0.0,0,0.0,0,],
            MovingZeros::moveZeros([9,0.0,0,9,1,2,0,1,0,1,0.0,3,0,1,9,0,0,0,0,9]));
    }

}
