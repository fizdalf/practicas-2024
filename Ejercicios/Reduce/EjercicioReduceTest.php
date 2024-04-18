<?php

namespace Ejercicios\Reduce;

require __DIR__.'/EjercicioReduce.php';

use PHPUnit\Framework\TestCase;

class EjercicioReduceTest extends TestCase
{
    public function testEjercicio0()
    {
        $this->assertEquals(
            40,
            EjercicioReduce::ejercicio0([4, 2, 5])
        );
    }

    public function testEjercicio1()
    {
        $this->assertEquals("holaadiós",
            EjercicioReduce::ejercicio1(["hola", "adiós"])
        );
    }

    public function testEjercicio2()
    {
        $this->assertEquals(160,
            EjercicioReduce::ejercicio2(["correr" => 10, "nadar" => 10, "jugar" => 120, "comer" => 20]));
    }

    public function testEjercicio3()
    {
        $this->assertEquals(6.75,
            EjercicioReduce::ejercicio3(["Matemáticas" => 5, "Ciencias Sociales" => 8, "Plástica" => 10, "Lengua" => 4])
        );
    }

    public function testEjercicio4()
    {
        $this->assertEquals(310.66,
            EjercicioReduce::ejercicio4(["ratón" => 10.50, "teclado" => 22.30, "monitor" => 120.43, "disco duro" => 157.43])
        );
    }

    public function testEjercicio5Part1()
    {
        $this->assertEquals(true,
            EjercicioReduce::ejercicio5([true, true, true])
        );
    }

    public function testEjercicio5Part2()
    {
        $this->assertEquals(false,
            EjercicioReduce::ejercicio5([true, false, true])
        );
    }

    public function testEjercicio6()
    {
        $this->assertEquals(50,
            EjercicioReduce::ejercicio6([20, 40, 60, 80])
        );
    }

    public function testEjercicio7()
    {
        $this->assertEquals(233,
            EjercicioReduce::ejercicio7([10, 5, 23, 125, 63, 233])
        );
    }
    public function testEjercicio9()
    {
        $this->assertEquals(184,
            EjercicioReduce::ejercicio9([45, 53,22,64])
        );
    }

    public function testEjercicio10()
    {
        $this->assertEquals(167,
            EjercicioReduce::ejercicio10([[2,5,3,2], [36,2,6], [23,88]])
        );
    }
}