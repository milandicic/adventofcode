<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;

class DayTwo implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $games = $dataProvider->toCollection();

        // trim the inputs from new line characters
        $games->transform(fn($game) => trim($game));

        $scores = $games->map(function($game) {
            return $this->scoreGame($game);
        });

        return $scores->sum();
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $games = $dataProvider->toCollection();

        // trim the inputs from new line characters
        $games->transform(fn($game) => trim($game));

        $scores = $games->map(function($game) {
            return $this->scoreGameTwo($game);
        });

        return $scores->sum();
    }

    private function scoreGame(string $game): int
    {
        $myPick = [
            'X' => 1,
            'Y' => 2,
            'Z' => 3
        ];

        $roundOutcome = [
            'A X' => 3,
            'A Y' => 6,
            'A Z' => 0,
            'B X' => 0,
            'B Y' => 3,
            'B Z' => 6,
            'C X' => 6,
            'C Y' => 0,
            'C Z' => 3
        ];

        [$opponent, $me] = explode(' ', $game);

        return $myPick[$me] + $roundOutcome[$game];
    }

    private function scoreGameTwo(string $game): int
    {
        [$opponent, $me] = explode(' ', $game);

        $myPick = [
            'X' => 1,
            'Y' => 2,
            'Z' => 3
        ];

        $gameResultShouldBe = [
            'X' => 0, // loss
            'Y' => 3, // draw
            'Z' => 6  // win
        ];

        $roundOutcome = [
            'A X' => 3,
            'A Y' => 6,
            'A Z' => 0,
            'B X' => 0,
            'B Y' => 3,
            'B Z' => 6,
            'C X' => 6,
            'C Y' => 0,
            'C Z' => 3
        ];

        $finalResult  = $gameResultShouldBe[$me];
        $possibleOutcome = collect($roundOutcome)->filter(function ($score, $game) use ($finalResult, $opponent) {
            [$opp, $me] = explode(' ', $game);
            return $score === $finalResult && $opp === $opponent;
        });

        [$opponentReal, $meReal] = explode(' ', $possibleOutcome->keys()->first());

        return $gameResultShouldBe[$me] + $myPick[$meReal];
    }
}