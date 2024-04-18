<?php

namespace Ejercicios\Filter;

require __DIR__.'/EjercicioFilter.php';

use PHPUnit\Framework\TestCase;

class EjercicioFilterTest extends TestCase
{
    public function testShouldReturnArrayWithOnlyOddNumbers()
    {
        $this->assertEquals([8,10,22,14,20], EjercicioFilter::ejercicio0([8, 10, 15, 22, 19, 3, 14, 20]));
    }

    public function testShouldReturnArrayWithOnlyTheLetterAInsideTheWords()
    {
        $this->assertEquals(['manzana', 'pera', 'banana', 'mango'], EjercicioFilter::ejercicio2(['manzana', 'pera', 'banana', 'kiwi', 'mango']));
    }
    public function testShouldReturnArray()
    {
        $this->assertEquals(['juan' => 20, 'adriana' => 24], EjercicioFilter::ejercicio3( ['juan' => 20, 'pedro' => 13, 'luisa' => 16, 'carlos' => 17, 'adriana' => 24]));
    }

    public function testShouldReturnArrayWithOnlyNumbersBetween5()
    {
        $this->assertEquals([10, 25, 30, 45, 50, 60, 65, 70, 85, 100], EjercicioFilter::ejercicio4([10, 25, 30, 45, 50, 60, 65, 70, 85, 100]));
    }
    public function testShouldReturnAnArrayWithMoreThanFourLettersInTheWord()
    {
        $this->assertEquals(['verde', 'blanco', 'negro', 'morado'], EjercicioFilter::ejercicio5(['rojo', 'verde', 'azul', 'blanco', 'negro', 'morado']));
    }

    public function testShouldReturnAnArrayOfMoreThan150OnValue()
    {
        $this->assertEquals(['ventas3' => 200, 'ventas5' => 400], EjercicioFilter::ejercicio6(['ventas1' => 100, 'ventas2' => 150, 'ventas3' => 200, 'ventas4' => 95, 'ventas5' => 400]));
    }

    public function testShouldReturn()
    {
        $this->assertEquals(['PHP', 'Python'], EjercicioFilter::ejercicio7(['PHP', 'JavaScript', 'Python', 'Java', 'C++']));
    }

    public function testShouldReturnAnArrayWithOnlyPrimeNumbers()
    {
        $this->assertEquals([2, 3, 5, 7], EjercicioFilter::ejercicio8([1, 2, 3, 4, 5, 6, 7, 8, 9]));
    }

    public function testShouldReturnAnArrayNoMoreThan5LettersPerWord()
    {
        $this->assertEquals( ['perro', 'coche'], EjercicioFilter::ejercicio9( ['casa', 'perro', 'coche', 'ciudad', 'pantalla']));
    }

    public function testShouldReturnAnArrayWithTheWordWhatsContainE()
    {
        $this->assertEquals(['perro', 'elefante', 'león', 'cebra', 'gacela'], EjercicioFilter::ejercicio10(['perro', 'gato', 'pájaro', 'elefante', 'león', 'cebra', 'gacela']));
    }
}