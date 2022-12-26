<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;

class DaySeven implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $instructions = $dataProvider->toArray();

        ray($instructions);
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        // TODO: Implement partTwo() method.
    }
}