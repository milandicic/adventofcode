<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;

class DayFour implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $pairs = $dataProvider->toCollection();
        $pairs->transform(fn($game) => trim($game));

        $ranges = $pairs->map(function($pair) {
            return $this->parsePairsStringToRanges($pair);
        });

        $counter = 0;
        $ranges->each(function ($range) use (&$counter) {
            $first = collect($range[0]);
            $second = collect($range[1]);

            $intersectionFirst = $first->intersect($second);
            $intersectionSecond = $second->intersect($first);
            if ($intersectionFirst->count() === $first->count() || $intersectionSecond->count() === $second->count()) {
                $counter++;
            }
        });

        return $counter;
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $pairs = $dataProvider->toCollection();
        $pairs->transform(fn($game) => trim($game));

        $ranges = $pairs->map(function($pair) {
            return $this->parsePairsStringToRanges($pair);
        });

        $counter = 0;
        $ranges->each(function ($range) use (&$counter) {
            $first = collect($range[0]);
            $second = collect($range[1]);

            $intersectionFirst = $first->intersect($second);
            if ($intersectionFirst->isNotEmpty()) {
                $counter++;
            }
        });

        return $counter;
    }

    private function parsePairsStringToRanges(string $pair): array
    {
        [$firstPairString, $secondPairString] = explode(',', $pair);

        return [
            $this->getRangeForString($firstPairString),
            $this->getRangeForString($secondPairString)
        ];
    }

    private function getRangeForString(string $rangeString): array
    {
        [$first, $last] = explode('-', $rangeString);

        return range($first, $last);
    }
}