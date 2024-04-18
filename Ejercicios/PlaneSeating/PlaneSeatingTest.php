<?php

namespace Ejercicios\PlaneSeating;

use PHPUnit\Framework\TestCase;

require __DIR__.'/PlaneSeating.php';


class PlaneSeatingTest extends TestCase
{
    public function testShouldReturnFrontLeftWhenTheSeatIsAAndLessThanTwentyOne()
    {
        $this->assertEquals("Front-Left", PlaneSeating::planeSeating("2A"));
    }
    public function testShouldReturnFrontMiddleWhenTheSeatIsAndLessThanTwentyOne()
    {
        $this->assertEquals("Front-Middle", PlaneSeating::planeSeating("20F"));
    }
    public function testShouldReturnFrontRightWhenTheSeatIsAndLessThanTwentyOne()
    {
        $this->assertEquals("Front-Right", PlaneSeating::planeSeating("2H"));
    }
    public function testShouldReturnMiddleLeftWhenTheSeatIsOverTwentyOneIsOnTheLeft()
    {
        $this->assertEquals("Middle-Left", PlaneSeating::planeSeating("27A"));
    }
    public function testShouldReturnMiddleMiddleWhenTheSeatIsOverTwentyOneAndIsOnTheMiddle()
    {
        $this->assertEquals("Middle-Middle", PlaneSeating::planeSeating("35D"));
    }
   public function testShouldReturnMiddleRightWhenTheSeatIsOverTwentyOneAndIsOnTheRight()
    {
        $this->assertEquals("Middle-Right", PlaneSeating::planeSeating("40K"));
    }
    public function testShouldReturnBackRightWhenTheSeatIsOverFortyOneAndIsOnTheRight()
    {
        $this->assertEquals("Back-Right", PlaneSeating::planeSeating("58H"));
    }
    public function testShouldReturnNullWhenTheSeatIsNotOnThePlane()
    {
        $this->assertEquals("No seat!!", PlaneSeating::planeSeating("62I"));
    }
    public function testShouldReturnBackMiddleTheSeatIsOverFortyOneAndIsOnTheMiddle()
    {
        $this->assertEquals("Back-Middle", PlaneSeating::planeSeating("46F"));
    }

    public function testBasic()
    {
        $this->assertEquals("No seat!!", PlaneSeating::planeSeating("45T"));
    }
}