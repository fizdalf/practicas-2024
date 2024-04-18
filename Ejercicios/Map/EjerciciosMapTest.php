<?php

namespace Ejercicios\Map;

use PHPUnit\Framework\TestCase;

require __DIR__.'/EjercicioMap.php';

class EjerciciosMapTest extends TestCase
{
    public function testShouldReturnArrayWithWordsFromPhraseReversed()
    {
        $expected = ['aloH', 'odnum', 'omoc', 'satse'];
        ob_start();
        EjercicioMap::ejercicioExample1();
        $result = explode(' ', trim(ob_get_clean()));
        $this->assertEquals($expected, ·res);
    }
//    public function testShouldReturnAnArrayWithTheFruitList()
//    {
//        $expected =['fruta_manzana','fruta_naranja','fruta_platano'];
//        ob_start();
//        $resultado = EjercicioMap::ejercicioExample2();
//        $result = explode( ' ', trim(ob_get_clean()));
//        $this->assertEquals($expected, $result);
//    }

                    //////////////// TAREAS XAVI //////////////////////

    public function testShouldReturnAnArrayOfStringNumbersAsIntegerNumbers()
    {
        $this->assertEquals([3,5,7], EjercicioMap::ejercicioExample3());
    }

    public function testShouldReturnAnArrayOfStringsInLocks()
    {
        $this->assertEquals(["HOLA","MUNDO"], EjercicioMap::ejercicio2());
    }

    public function testShouldReturnAnArrayOfNumbersOfSquare()
    {
        $this->assertEquals([1,4,9,16,25], EjercicioMap::ejercicio3());
    }

    public function testShouldReturnAnArrayOfStringConcat()
    {
        $this->assertEquals(["hola concatenado", "mundo concatenado"], EjercicioMap::ejercicio4());
    }

    public function testShouldReturnAnArrayToABooleanArray()
    {
        $this->assertEquals([false, true, true, false, false], EjercicioMap::ejercicio5());
    }

    public function testShouldReturnALengthOfAnArray()
    {
        $this->assertEquals([4,5,3], EjercicioMap::ejercicio6());
    }

    public function testShouldReturnTheFirstCharacterPerWordInAnArray()
    {
        $this->assertEquals(["h","m","p"], EjercicioMap::ejercicio7());
    }

    public function testReturnAnArray()
    {
        $this->assertEquals(["John", "Jane"], EjercicioMap::ejercicio8());
    }

    public function testShouldReturnEveryElementFromAnArrayOfArrays()
    {
        $this->assertEquals([["John"],["Jane"]], EjercicioMap::ejercicio9());
    }


    public function testShouldReturnAnAbsoluteValueOfEveryElementOFArray()
    {
        $this->assertEquals([1, 2, 3, 4, 5], EjercicioMap::ejercicio10());
    }
}
