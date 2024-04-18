<?php

namespace Ejercicios\RockPaperScissors;

require __DIR__ . '/Rpc.php';

class RpcTest extends \PHPUnit\Framework\TestCase
{
    public function testFunctionIsDefined()
    {
        $result = Rpc::rpc("", "");
        $this->assertEquals("Draw!", $result);
    }

    public function testShouldReturnDrawWhenBothPaper()
    {
        $result = Rpc::rpc("paper", "paper");
        $this->assertEquals("Draw!", $result);
    }

    public function testShouldReturnDrawWhenBothRock()
    {
        $result = Rpc::rpc("rock", "rock");
        $this->assertEquals("Draw!", $result);
    }

    public function testShouldReturnDrawWhenBothScissors()
    {
        $result = Rpc::rpc("scissors", "scissors");
        $this->assertEquals("Draw!", $result);
    }

    //Player 1 Wins

    public function testShouldReturnPlayer1WinWhenPaperRock()
    {
        $result = Rpc::rpc("paper", "rock");
        $this->assertEquals("Player 1 won!", $result);
    }

    public function testShouldReturnPlayer1WinWhenRockScissors()
    {
        $result = Rpc::rpc("rock", "scissors");
        $this->assertEquals("Player 1 won!", $result);
    }

    public function testShouldReturnPlayer1WinWhenScissorsPaper()
    {
        $result = Rpc::rpc("scissors", "paper");
        $this->assertEquals("Player 1 won!", $result);
    }

    //Player 2 Wins
    public function testShouldReturnPlayer2WinWhenRockPaper()
    {
        $result = Rpc::rpc("rock", "paper");
        $this->assertEquals("Player 2 won!", $result);
    }

    public function testShouldReturnPlayer2WinWhenPaperScissors()
    {
        $result = Rpc::rpc("paper", "scissors");
        $this->assertEquals("Player 2 won!", $result);
    }

    public function testShouldReturnPlayer2WinWhenScissorsRock()
    {
        $result = Rpc::rpc("scissors", "rock");
        $this->assertEquals("Player 2 won!", $result);
    }
}