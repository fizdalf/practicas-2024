<?php

namespace Ejercicios\MRF;

require __DIR__.'/TareasMRF.php';

use PHPUnit\Framework\TestCase;

class TareasMRFTest extends  TestCase
{
    public function testEjercicio1()
    {
        $this->assertEquals(18,
            TareasMFR::ejercicio1(["Hola", "Mundo", "PHP", "OpenAI"])
        );
    }

    public function testEjercicio2()
    {
        $this->assertEquals(25,
            TareasMRF::ejercicio2([
                ['nombre' => 'Juan', 'edad' => 25],
                ['nombre' => 'María', 'edad' => 17],
                ['nombre' => 'Pedro', 'edad' => 30],
                ['nombre' => 'Luisa', 'edad' => 20],
                ['nombre' => 'Ana', 'edad' => 16]
            ])
        );
    }

    public function testEjercicio3()
    {
        $this->assertEquals(46.5,
            TareasMRF::ejercicio3([
                ["nombre" => "Producto1", "precio_original" => 50, "descuento" => 10],
                ["nombre" => "Producto2", "precio_original" => 100, "descuento" => 20],
                ["nombre" => "Producto3", "precio_original" => 80, "descuento" => 0],
                ["nombre" => "Producto4", "precio_original" => 120, "descuento" => 15],
                ["nombre" => "Producto5", "precio_original" => 70, "descuento" => 5]
            ])
        );

    }

    public function testEjercicio4()
    {
        $this->assertEquals(["María", "Pedro"],
            TareasMRF::ejercicio4([
                ['nombre' => 'Juan', 'promedio' => 75],
                ['nombre' => 'María', 'promedio' => 85],
                ['nombre' => 'Pedro', 'promedio' => 90],
                ['nombre' => 'Luisa', 'promedio' => 70]
            ]));
    }
    public function testEjercicio5()
    {
        $this->assertEquals(4700,
            TareasMRF::ejercicio5([
                ['cliente' => 'Juan', 'monto' => 1500],
                ['cliente' => 'María', 'monto' => 800],
                ['cliente' => 'Pedro', 'monto' => 1200],
                ['cliente' => 'Luisa', 'monto' => 2000]
            ])
        );
    }

    public function testEjercicio6()
    {
        $this->assertEquals(75,
            TareasMRF::ejercicio6([
                ['producto' => 'Laptop', 'precio' => 800, 'cantidad' => 10],
                ['producto' => 'Teléfono', 'precio' => 400, 'cantidad' => 20],
                ['producto' => 'Tablet', 'precio' => 100, 'cantidad' => 30],
                ['producto' => 'Smartwatch', 'precio' => 120, 'cantidad' => 15]
            ])
        );
    }

    public function testEjercicio7()
    {
        $this->assertEquals(120,
            TareasMRF::ejercicio7([
                ['empleado' => 'Juan', 'horas' => 40],
                ['empleado' => 'María', 'horas' => 25],
                ['empleado' => 'Pedro', 'horas' => 35],
                ['empleado' => 'Luisa', 'horas' => 45]
            ])
        );
    }

    public function testEjercicio8()
    {
        $this->assertEquals(220,
            TareasMRF::ejercicio8(
                [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
            ));
    }

    public function testEjercicio9()
    {
        $this->assertEquals(55,
            TareasMRF::ejercicio9([1, 2, 3, 4, 5])
        );
    }

    public function testEjercicio10()
    {
        $this->assertEquals(80,
            TareasMRF::ejercicio10([2, 4, 6, 8, 10])
        );
    }
}