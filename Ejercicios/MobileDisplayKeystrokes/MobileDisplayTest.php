<?php

namespace Ejercicios\MobileDisplayKeystrokes;

use PHPUnit\Framework\TestCase;

require __DIR__.'/MobileDisplay.php';

class MobileDisplayTest extends TestCase
{
//    public function testEjercicio()
//    {
//        $datos = [
//            '2' => 4, '22' => 4, '222' => 4,
//            '3' => 4, '33' => 4, '333' => 4,
//            '4' => 4, '44' => 4, '444' => 4,
//            '5' => 4, '55' => 4, '555' => 4,
//            '6' => 4, '66' => 4, '666' => 4,
//            '7' => 5, '77' => 5, '777' => 5, '7777' => 5,
//            '8' => 4, '88' => 4, '888' => 4,
//            '9' => 5, '99' => 5, '999' => 5, '9999' => 5,
//            '*' => 1, '#' => 1,
//            '0' => 2, '00' => 2, '000' => 2, '0000' => 2,
//        ];
//        $this->assertEquals(12, MDK::ejercicio($datos, "abc"));
//
//    }
//    /*
//    public function testShouldReturn()
//    {
//        $this->assertEquals(["hola",7], MobileDisplay::ejercicio());
//    }
//    */

    public function testItShouldReturnOneWhenStringWithNumberOneIsReceived()
    {
        $this->assertEquals(1, MobileDisplay::mobileKeyboard("1"));
    }

    public function testItShouldReturnOneWhenStringWithNumberTwoIsReceived()
    {
        $this->assertEquals(1, MobileDisplay::mobileKeyboard("2"));
    }

    public function testItShouldReturnTwoWhenStringWith_a_IsReceived()
    {
        $this->assertEquals(2, MobileDisplay::mobileKeyboard("a"));
    }

    public function testItShouldReturnTwoWhenStringWith_d_IsReceived()
    {
        $this->assertEquals(2, MobileDisplay::mobileKeyboard("d"));
    }

    public function testItShouldReturnTwoWhenStringWith_g_IsReceived()
    {
        $this->assertEquals(2, MobileDisplay::mobileKeyboard("g"));
    }

    public function testItShouldReturnTwoWhenStringWith_m_IsReceived()
    {
        $this->assertEquals(2, MobileDisplay::mobileKeyboard("m"));
    }

    public function testItShouldReturnTwoWhenStringWith_p_IsReceived()
    {
        $this->assertEquals(2, MobileDisplay::mobileKeyboard("p"));
    }

    public function testItShouldReturnTwoWhenStringWith_t_IsReceived()
    {
        $this->assertEquals(2, MobileDisplay::mobileKeyboard("t"));
    }

    public function testItShouldReturnTwoWhenStringWith_w_IsReceived()
    {
        $this->assertEquals(2, MobileDisplay::mobileKeyboard("w"));
    }

    public function testItShouldReturnThreeWhenStringWith_b_IsReceived()
    {
        $this->assertEquals(3, MobileDisplay::mobileKeyboard("b"));
    }

    public function testItShouldReturnFourWhenStringWith_c_IsReceived()
    {
        $this->assertEquals(4, MobileDisplay::mobileKeyboard("c"));
    }

    public function testItShouldReturnOneForHastag(){
        $this->assertEquals(1, MobileDisplay::mobileKeyboard("#"));
    }

    public  function testItShouldReturnTwentySixWhen_codewars_isProvided(){
        $this->assertEquals(26, MobileDisplay::mobileKeyboard("codewars"));
    }
    public  function testItShouldReturnOneHundredAndSevenWhen_longwordwhichdontreallymakessense_isProvided(){
        $this->assertEquals(107, MobileDisplay::mobileKeyboard("longwordwhichdontreallymakessense"));
    }
}