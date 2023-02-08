<?php

namespace Adventofcode\Year2022\DayEleven;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;
use Illuminate\Support\Collection;
class DayEleven implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $rounds = 20;
        $data = $dataProvider->toCollection();
        $this->createMonkeys($data);

        foreach (range(1, $rounds) as $round) {
            foreach (Monkey::$monkeys as $monkey) {
                $monkey->doTheMonkeyBusiness();
            }
        }

        return Monkey::levelOfMonkeyBusiness();
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $rounds = 10000;
        $data = $dataProvider->toCollection();
        $this->createMonkeys($data);

        foreach (range(1, $rounds) as $round) {
            foreach (Monkey::$monkeys as $monkey) {
                $monkey->withoutRelief()->doTheMonkeyBusiness();
            }
        }

        return Monkey::levelOfMonkeyBusiness();
    }

    private function createMonkeys(Collection $data)
    {
        // sanitize monkey data
        $data->chunkWhile(function ($value) {
            return $value !== '';
        })->map(function ($monkeyData) {
            return $monkeyData->filter(fn($monkeyDataLineItem) => $monkeyDataLineItem !== '');
        })->each(function ($monkeyData) {
            $monkeyData = $monkeyData->values(); //reindex collection

            Monkey::$monkeys[] = new Monkey($monkeyData);
        });
    }
}