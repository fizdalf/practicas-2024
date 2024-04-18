<?php

namespace Ejercicios\TotalAmountOfPoints;

class Taop
{
    public static function points(array $games): int
    {
        $totalPoints = 0;
        foreach ($games as $match) {
            $matchPoints = self::getMatchPoints($match);
            $totalPoints += $matchPoints;
        }
        return $totalPoints;
    }

    /**
     * @param $matchResult
     * @return int
     */
    public static function getMatchPoints(string $matchResult): int
    {
        [$ourTeamScore, $otherTeamScore] = explode(":", $matchResult);
        if ($ourTeamScore > $otherTeamScore) {
            return 3;
        }
        if ($ourTeamScore === $otherTeamScore) {
            return 1;
        }
        return 0;
    }
}