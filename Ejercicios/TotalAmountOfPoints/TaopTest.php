<?php
namespace Ejercicios\TotalAmountOfPoints;
use PHPUnit\Framework\TestCase;

require __DIR__.'/Taop.php';
class TaopTest extends TestCase
{

    public function testShouldReturnOneWhenAllMatchesAreDrawAtZeroPoints(){
        $result = Taop::Points([
            "0:0"
        ]);
        $this->assertEquals(1, $result);
    }
    public function testShouldReturnTwoWhenAllMatchesAreDrawAtZeroPoints(){
        $result = Taop::Points([
            "0:0",
            "0:0",
        ]);
        $this->assertEquals(2, $result);
    }
    public function testShouldReturnSevenWhenAllMatchesAreDrawAtZeroPoints(){
        $result = Taop::Points([
            "0:0",
            "0:0",
            "0:0",
            "0:0",
            "0:0",
            "0:0",
            "0:0",
        ]);
        $this->assertEquals(7, $result);
    }
    public function testShouldReturnThreeWhenOneWonMatch(){
        $result = Taop::Points([
            "1:0",
        ]);
        $this->assertEquals(3, $result);
    }
    public function testShouldReturnThreeWhenOneWonMatch1(){
        $result = Taop::Points([
            "2:1",
        ]);
        $this->assertEquals(3, $result);
    }
   public function testShouldReturnSixWhenTwoWonMatch(){
       $result = Taop::Points([
           "2:1",
           "3:0",
       ]);
        $this->assertEquals(6, $result);
   }
    public function testShouldReturnTwentyOneWhenSevenWonMatch(){
        $result = Taop::Points([
            "2:1",
            "3:0",
            "2:1",
            "3:0",
            "2:1",
            "3:0",
            "2:1",
        ]);
        $this->assertEquals(21, $result);
    }
    public function testBasic() {
        $this->assertSame(30,Taop::points(['1:0','2:0','3:0','4:0','2:1','3:1','4:1','3:2','4:2','4:3']));
        $this->assertSame(10,Taop::points(['1:1','2:2','3:3','4:4','2:2','3:3','4:4','3:3','4:4','4:4']));
        $this->assertSame(0, Taop::points(['0:1','0:2','0:3','0:4','1:2','1:3','1:4','2:3','2:4','3:4']));
        $this->assertSame(15,Taop::points(['1:0','2:0','3:0','4:0','2:1','1:3','1:4','2:3','2:4','3:4']));
        $this->assertSame(12,Taop::points(['1:0','2:0','3:0','4:4','2:2','3:3','1:4','2:3','2:4','3:4']));
    }
}
