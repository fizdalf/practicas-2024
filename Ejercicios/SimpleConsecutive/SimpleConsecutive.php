<?php

namespace Ejercicios\SimpleConsecutive;

class SimpleConsecutive
{
    public static function par(array $datos): int
    {
        $contador = 0;
        $index = 0;
        while($index < count($datos) && count($datos) >= 2){
            $firstElement = $datos[$index];
            $secondElement = $datos[$index + 1];
            $contador += self::isConsecutivePair($firstElement, $secondElement);
            $index += 2;
        }
        return $contador;
    }

    /**
     * @param $firstElement
     * @param $secondElement
     * @return int
     */
    public static function isConsecutivePair($firstElement, $secondElement): int
    {
        $difference = $firstElement - $secondElement;
        if (abs($difference) === 1) {
            return 1;
        }
        return 0;
    }
}
