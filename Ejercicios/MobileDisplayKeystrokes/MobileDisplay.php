<?php

namespace Ejercicios\MobileDisplayKeystrokes;

class MobileDisplay
{
    public static function ejercicio($datos, $palabra) {
        $keystrokes = 0;
        for ($i = 0; $i < strlen($palabra); $i++) {
            $char = $palabra[$i];
            if ($char) {
                $key = ord($char) - ord('a') + 2;
                $keystrokes += $datos[str_repeat($key, ($i % 3) + 1)];
            } elseif (ctype_digit($char) || $char === '*' || $char === '#') {
                $keystrokes += $datos[$char];
            }
        }
        return $keystrokes;
    }


    public static function mobileKeyboard(string $string): int
    {
        return array_reduce(str_split($string), function($carry, $character){
            return $carry + self::getStrokesForChar($character);
        }, 0);
    }


    


/*
    public static function ejercicio($cadena)
    {
        // Definimos un array asociativo con las letras y sus correspondientes teclas
        $teclas = [
            'abc' => 2, 'def' => 3, 'ghi' => 4,
            'jkl' => 5, 'mno' => 6, 'pqrs' => 7,
            'tuv' => 8, 'wxyz' => 9,
            '*' => 10,  '0' => 11, '#' => 12
        ];

        $pulsaciones = 0;

        // Iteramos sobre cada carácter de la cadena
        foreach (str_split($cadena) as $caracter) {
            // Convertimos el carácter a minúsculas para manejarlo de manera consistente
            $caracter = strtolower($caracter);

            // Si el carácter está en el array de teclas, sumamos el número de pulsaciones correspondiente
            foreach ($teclas as $letras => $tecla) {
                if (strpos($letras, $caracter) !== false) {
                    $pulsaciones += array_search($caracter, str_split($letras)) + 1;
                    break;
                }
            }
        }
        return $pulsaciones;
    }
*/
    /**
     * @param string $string
     * @return int
     */
    public static function getStrokesForChar(string $string): int
    {
        $groups = [
            [
                'groupDescription' => 'adgjmptw',
                'strokes' => 2
            ],
            [
                'groupDescription' => 'behknqux',
                'strokes' => 3
            ],
            [
                'groupDescription' => 'cfilorvy',
                'strokes' => 4
            ],
            [
                'groupDescription' => 'sz',
                'strokes' => 5
            ],

        ];
        $strokes = array_reduce($groups, function ($carry, $group) use ($string) {
            $strokeGroup = $group['groupDescription'];
            if (strpos($strokeGroup, $string) !== false) {
                return $group['strokes'];
            }
            return $carry;
        }, 1);
        return $strokes;
    }
}