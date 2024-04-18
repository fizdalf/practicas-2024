<?php

namespace Ejercicios\Reduce;

use function PHPUnit\Framework\assertEquals;

class EjercicioReduce
{
//Tienes un array de números. Usa la función reduce para encontrar la multiplicación de todos los números.
//[4,2,5] => 40

    public static function ejercicio0($datos)
    {
        return array_reduce($datos, function ($carry, $item){
            return $carry * $item;
        }, 1);
    }

    public static function ejercicio1($datos)
    {
        return array_reduce($datos, function ($carry, $item){
            return $carry . $item;
        });
    }

    public static function ejercicio2($datos)
    {
        return array_reduce($datos, function ($carry, $item){
            return $carry + $item;
        },0);
    }

    public static function ejercicio3($datos)
    {
        $a = array_reduce($datos, function ($carry, $item){
            return $carry + $item;
        });
        return $a/ count($datos);
    }

    public static function ejercicio4($datos)
    {
        return array_reduce($datos, function ($carry, $item){
            return $carry + $item;
        });
    }

    public static function ejercicio5($datos)
    {
        $a = array_reduce($datos, function ($carry, $item){
            return $carry && $item;
        }, true);

        return $a;
    }

    public static function ejercicio6($datos)
    {
        $a = array_reduce($datos, function ($carry, $item){
            return $carry + $item;
        },0);
        return $a/ count($datos);
    }

    public static function ejercicio7($datos)
    {
        $a = array_reduce($datos, function ($carry, $item){
            return $item > $carry ? $item : $carry;
        });
        return $a;

    }
    public static function ejercicio9($datos)
    {
        return array_reduce($datos, function ($carry, $item){
            return $carry + $item;
        },0);
    }

    public static function ejercicio10($datos)
    {
        return array_reduce($datos, function ($carry, $item){
            return $carry + array_sum($item);
        });

    }
}