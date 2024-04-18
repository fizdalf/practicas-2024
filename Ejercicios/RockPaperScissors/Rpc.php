<?php

namespace Ejercicios\RockPaperScissors;
class Rpc
{
    public static function rpc(string $player1, string $player2): string
    {
        if ($player1 === "paper" && $player2 === "rock" || $player1 === "rock" && $player2 === "scissors" || $player1 === "scissors" && $player2 === "paper") {
            return "Player 1 won!";
        }
        if ($player2 === "paper" && $player1 === "rock" || $player2 === "scissors" && $player1 === "paper" || $player2 === "rock" && $player1 === "scissors") {
            return "Player 2 won!";
        }
        return "Draw!";
    }
}

