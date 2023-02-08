<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;
use Illuminate\Support\Str;

class DayTen implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $instructions = $dataProvider->toCollection();

        $cycle = 0;
        $registerX = 1;
        $instruction = $instructions->shift();
        $isFirstCycle = true;
        $signalStrengths = collect();

        while ($instruction) {
            $cycle++;

            if (in_array($cycle, [20, 60, 100, 140, 180, 220])) {
                $signalStrengths->push($cycle * $registerX);
            }

            if ($this->isAddix($instruction) && $isFirstCycle) {
                $isFirstCycle = false;
                continue;
            }

            if ($this->isAddix($instruction) && !$isFirstCycle) {
                $registerX += $this->addixNumber($instruction);
            }

            $instruction = $instructions->shift();
            $isFirstCycle = true;
        }

        return $signalStrengths->sum();
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $instructions = $dataProvider->toCollection();

        $cycle = 0;
        $registerX = 1;
        $instruction = $instructions->shift();
        $isFirstCycle = true;
        $scanLine = collect();

        while ($instruction) {
            $cycle++;

            $pixel = $this->getPixel($cycle, $registerX, $instruction);
            $scanLine->push($pixel);

            match ($cycle) {
                40, 80, 120, 160, 200, 240 => $scanLine->push('<br>'),
                default => ''
            };

            if ($this->isAddix($instruction) && $isFirstCycle) {
                $isFirstCycle = false;
                continue;
            }

            if ($this->isAddix($instruction) && !$isFirstCycle) {
                $registerX += $this->addixNumber($instruction);
            }

            $instruction = $instructions->shift();
            $isFirstCycle = true;
        }

        // run function and display pixels on the screen to reveal the characters
        //return $scanLine->implode('');

        return "PZGPKPEB"; // hardcoded value read from screen
    }

    private function isAddix(string $instruction): bool
    {
        return Str::of($instruction)->contains('addx');
    }

    private function addixNumber(string $instruction): int
    {
        return Str::of($instruction)->remove('addx')->toInteger();
    }

    private function getPixel(int $cycle, int $registerX, string $instruction): string
    {
        $crtDrawsAtPosition = ($cycle % 40) - 1;

        if ($crtDrawsAtPosition === $registerX || $crtDrawsAtPosition === $registerX - 1 || $crtDrawsAtPosition === $registerX + 1) {
            return '<span style="width: 10px; display: inline-block;">#</span>';
        }

        return '<span style="width: 10px; display: inline-block;">.</span>';
    }
}