<?php

namespace Ejercicios\MRF;

class TareasMRF
{
    public static function ejercicio1($datos)
    {
        $a = array_map(function ($n) {
            return strlen($n);
        }, $datos);
        $b = array_reduce($a, function ($carry, $item) {
            return $carry + $item;
        }, 0);
        return $b;
    }

    public static function ejercicio2($datos)
    {
        $a = array_filter($datos, function ($n) {
            return $n['edad'] > 18;
        });

        $b = array_map(function ($n) {
            return $n['edad'];
        }, $a);

        $c = array_reduce($b, function ($carry, $item) {
            return $carry + $item;
        });

        return $c / count($b);
    }

    public static function ejercicio3($datos)
    {
        $a = function ($producto) {
            $precio_original = $producto['precio_original'];
            $descuento = $producto['descuento'];
            return ($precio_original * $descuento) / 100;
        };

        $b = array_map($a, $datos);

        $total_descuento = array_reduce($b, function ($acumulador, $descuento) {
            return $acumulador + $descuento;
        }, 0);

        return $total_descuento;
    }

    public static function ejercicio4($datos)
    {
        $filteredStudents = array_reduce($datos, function ($carry, $estudiante) {
            return $estudiante['promedio'] > 80;
        });
        return array_map(function ($student){return $student['nombre'];},$filteredStudents);
    }

    public static function ejercicio5($datos)
    {
        $a = array_reduce(array_filter($datos, function ($n) {
            return $n['monto'] > 1000;
        }),
            function ($carry, $item) {
                return $carry + $item['monto'];
            },
            0
        );
        return $a;

    }
    public static function ejercicio6($datos)
    {
        $a = array_reduce(
            array_filter($datos, function ($producto) {
                return $producto['precio'] > 50;
            }),
            function ($carry, $producto) {
                return $carry + $producto['cantidad'];
            },
            0
        );
        return $a;
    }

    public static function ejercicio7($datos)
    {
        $totalHoras = array_reduce(array_filter($datos, function ($empleado) {
            return $empleado['horas'] > 30;
        }),
            function ($carry, $item) {
                return $carry + $item['horas'];
            },
            0
        );

        return $totalHoras;
    }

    public static function ejercicio8($datos)
    {

        $a = array_filter($datos, function ($n) {
            return $n % 2 === 0;
        });

        $b = array_map(function ($m) {
            return $m * $m;
        }, $a);

        $total = array_reduce($b, function ($carry, $item) {
            return $carry + $item;
        }, 0);

        return $total;
    }

    public static function ejercicio9($datos)
    {
        $total = array_reduce(array_map(function ($n) {
            return $n * $n;
        }, $datos), function ($carry, $item) {
            return $carry + $item;
        });
        return $total;
    }

    public static function ejercicio10($datos)
    {
        $multipliedNumbers = array_map(function ($num, $index) {
            return $num * $index;
        }, $datos, array_keys($datos));


        $total = array_reduce($multipliedNumbers, function ($carry, $item) {
            return $carry + $item;
        }, 0);

        return $total;
    }
}