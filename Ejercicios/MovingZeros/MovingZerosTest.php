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

    public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray0()
    {
        $this->assertSame([0], MovingZeros::moveZeros([0]));
    }
    public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray1()
    {
        $this->assertSame([false,1,1,2,1,3,"a",0,0],MovingZeros::moveZeros([false,1,0,1,2,0,1,3,"a"]));
    }
 public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray2()
    {
        $this->assertSame(["a","b","c","d",1,1,3,1,9,9,0,0,0,0,0,0,0,0,0,0],
            MovingZeros::moveZeros(["a",0,0,"b","c","d",0,1,0,1,0,3,0,1,9,0,0,0,0,9]));
    }
 public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray3()
    {
        $this->assertSame(["a","b",null,"c","d",1,false,1,3,[],1,9,9,0,0,0,0,0,0,0,0,0,0],
            MovingZeros::moveZeros(["a",0,0,"b",null,"c","d",0,1,false,0,1,0,3,[],0,1,9,0,0,0,0,9]));
    }
 public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray4()
    {
        $this->assertSame([1,null,2,false,1,0,0],
            MovingZeros::moveZeros([0,1,null,2,false,1,0]));
    }
 public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray5()
    {
        $this->assertSame(["a","b"],
            MovingZeros::moveZeros(["a","b"]));
    }

//     public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray6()
//    {
//        $this->assertSame([9,9,1,2,1,1,3,1,9,9,0,0,0,0,0,0,0.0,0,0.0,0,],
//            MovingZeros::moveZeros([9,0.0,0,9,1,2,0,1,0,1,0.0,3,0,1,9,0,0,0,0,9]));
//    }

}
