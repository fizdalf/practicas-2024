<?php

namespace Ejercicios\MovingZeros;

use Ejercicios\MobileDisplayKeystrokes\MobileDisplay;
use PHPUnit\Framework\TestCase;

require __DIR__.'/MovingZeros.php';

class MovingZerosTest extends TestCase
{
    public function testShouldReturnAnEmptyArrayWhenItReceivesAnEmptyArray()
    {
        $this->assertSame([],MovingZeros::moveZeros([]));
    }
}