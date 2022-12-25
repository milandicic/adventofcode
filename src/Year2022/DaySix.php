<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;

class DaySix implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $packets = $dataProvider->toArray()[0];

        $signals = collect(str_split($packets))->sliding(4);

        $index = 0;
        $found = false;
        $signals->each(function($window) use (&$found, &$index) {
            $duplicates = $window->duplicates();
            if ($duplicates->isEmpty() && !$found) {
                $index = $window->keys()->last() + 1;
                $found = true;
            }
        });

        return $index;
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $packets = $dataProvider->toArray()[0];

        $signals = collect(str_split($packets))->sliding(14);

        $index = 0;
        $found = false;
        $signals->each(function($window) use (&$found, &$index) {
            $duplicates = $window->duplicates();
            if ($duplicates->isEmpty() && !$found) {
                $index = $window->keys()->last() + 1;
                $found = true;
            }
        });

        return $index;
    }
}