<?php

namespace Ejercicios\PlaneSeating;

class PlaneSeating
{
    public static function planeSeating($n)
    {
        $number = substr($n, 0, -1);
        $letter = $n[strlen($n) - 1];

        $seat
            = [
            'A' => 'Left', 'B' => 'Left', 'C' => 'Left',
            'D' => 'Middle', 'E' => 'Middle', 'F' => 'Middle',
            'G' => 'Right', 'H' => 'Right', 'K' => 'Right',
        ];
        if ($number <= 20) {
            $position = "Front";
        } elseif ($number <= 40) {
            $position = "Middle";
        } elseif ($number <= 60) {
            $position = "Back";
        } else {
            return "No seat!!";
        }
            return $position . '-' . $seat [$letter];
    }
}