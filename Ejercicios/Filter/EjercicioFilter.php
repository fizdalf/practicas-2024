<?php

namespace Ejercicios\Filter;

class EjercicioFilter
{
    //Tienes un array de numeros [5, 10, 15, 22, 19, 3, 14, 20]. Escribe una función usando filter que retorne solo los números pares.
    public static function ejercicio0(array $datos)
    {
        return array_values(array_filter($datos, function ($n) {
            if ($n % 2 === 0) {
                return true;
            }
            return false;
        }
        ));
    }

    //Tienes el siguiente array de strings ['manzana', 'pera', 'banana', 'kiwi', 'mango']. Usa filter para retornar un nuevo array que sólo contenga las frutas que contengan la letra 'a'.
    public static function ejercicio2(array $datos)
    {
        return array_values(array_filter($datos, function ($n) {
            return strpos($n, "a") !== false;
        }
        ));
    }

    //Partiendo de un array de edades ['juan' => 20, 'pedro' => 13, 'luisa' => 16, 'carlos' => 17, 'adriana' => 24], crea una función utilizando filter que retorne un array con los nombres de aquellos que son mayores a 18 años.
    public static function ejercicio3(array $datos)
    {
        return array_filter($datos, function ($n) {
            return $n > 18;
        });
        return array_keys(ejercicio3($n));
    }

    public static function ejercicio4($datos)
    {// Filtrar el array para obtener solo estudiantes con calificación mayor a 88
        return array_values(array_filter($datos, function ($n) {
            if ($n % 5 === 0) {
                return true;
            }
            return false;
        }
        ));
    }

    public static function ejercicio5($colores)
    {
        // Filtrar el array para obtener solo colores con más de 4 letras
        $color4 = array_values(array_filter($colores, function ($color) {
            return strlen($color) > 4;
        }));

        return $color4;
    }

    public static function ejercicio6($ventas)
    {
        // Filtrar el array para obtener solo las ventas mayores a $150
        $ventas150 = array_filter($ventas, function ($ventas) {
            return $ventas > 150;
        });
        return $ventas150;
    }

    public static function ejercicio7($datos)
    {
        return array_values(array_filter($datos, function ($n) {
            return strpos($n, "P") !== false;
        }
        ));
    }

    public static function ejercicio8($datos)
    {
        function esPrimo($numero)
        {
            if ($numero <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($numero); $i++) {
                if ($numero % $i == 0) {
                    return false;
                }
            }
            return true;
        }

        return array_values(array_filter($datos, function ($numero) {
            return esPrimo($numero);
        }));
    }

    public static function ejercicio9($datos)
    {
        return array_values(array_filter($datos, function ($n) {
            return strlen($n) === 5;
        }));
    }

    public static function ejercicio10($datos)
    {
        return array_values(array_filter($datos, function ($n) {
            return strpos($n, "e") !== false;
        }));
    }
}
