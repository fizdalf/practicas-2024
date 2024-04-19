<?php

namespace Ejercicios\MovingZeros;

// Solo mover Ceros.

class MovingZeros
{
        public static function moveZeros(array $items)
        {
            //sreturn array_reverse($dato);

            //cuenta cero
            $contaZero = 0;
            foreach ($items as $element) {
                if ($element === 0) {
                    $contaZero++;
                }
            }
            // No hay cero, no opero
            if ($contaZero === 0){
                return $items;
            }

            //Separa cero
            $nZero = [];
            $zeroNoConta = [];

            foreach ($items as $element) {
                if ($element === 0) {
                    $nZero[] = $element;
                } else {
                    $zeroNoConta[] = $element;
                }
            }
            return array_merge($zeroNoConta, $nZero);
        }
}