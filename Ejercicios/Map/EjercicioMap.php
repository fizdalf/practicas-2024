<?php

namespace Ejercicios\Map;
class EjercicioMap
{
        public static function ejercicioExample1(){
        $phrase = "Hola mundo como estas";
        $words = explode(" ", $phrase);
        $result = array_map('strrev', $words);
        echo implode(" ", $result);
    }
//    public static function ejercicioExample2(){
//        $array = ["manzana", "naranja", "plátano"];
//        $result = array_map(function($x) { return "fruta_" . $x; }, $array);
//        return $result;
//    }


    public static function ejercicioExample3(){
            $array = ['3','5','7'];
             return array_map("intval", $array);
    }
                        //////////////// TAREAS XAVI //////////////////////
    public static function ejercicio2(){
        $datos = ['hola', 'mundo'];
        return array_map("strtoupper", $datos);
    }
    public static function ejercicio3()
    {
        $datos = [1, 2, 3, 4, 5];
        return array_map(function($num) {
            return pow($num, 2);
        }, $datos);
    }
    public static function ejercicio4()
    {
        $datos =  ['hola', 'mundo'];
        $n = ' concatenado';

        $concatenacio = function($datos) use ($n){
          return $datos . $n;
         };
        return array_map($concatenacio ,$datos);
;    }
    public static function ejercicio5(){
        $datos = [0, 1, 'hola', '', null];
        return array_map("boolval", $datos);
    }
    public static function ejercicio6(){
        $datos = ['hola', 'mundo', 'php'];

        return array_map("strlen", $datos);
    }
    public static function ejercicio7()
    {
        $array = ['hola', 'mundo', 'php'];
        $primerCaracter = array_map(function($b) {return $b[0];}, $array);
        return $primerCaracter;
    }
    public static function ejercicio8()
    {
        $datos = [(object)['name' => 'John'], (object)['name' => 'Jane']];
        $resultado = array_map(function($objeto) {return $objeto->name;}, $datos);
        return $resultado;
    }

    public static function ejercicio9()
    {
        $datos = [['name' => 'John'], ['name' => 'Jane']];

        return array_map("array_values", $datos);
    }

    public static function ejercicio10()
    {
        $array = [-1, -2, -3, -4, -5];
        return array_map("abs", $array);
    }
}