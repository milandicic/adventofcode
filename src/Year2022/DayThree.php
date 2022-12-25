<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;

class DayThree implements AdventOfCodeInterface
{
    public function partOne(DataProviderAbstract $dataProvider)
    {
        $rucksacks = $dataProvider->toCollection();
        $rucksacks->transform(fn($game) => trim($game));

        // split rucksacks into two compartments
        $rucksacksWithCompartments = $rucksacks->mapWithKeys(function ($rucksack) {
            [$firstCompartment, $secondCompartment] = str_split($rucksack, strlen($rucksack) / 2);
            $repeatingItemType = array_unique(array_intersect(str_split($firstCompartment), str_split($secondCompartment)));
            $repeatingItemTypeChar = array_values($repeatingItemType)[0];
            return [
                $rucksack => [
                    'first_compartment' => $firstCompartment,
                    'second_compartment' => $secondCompartment,
                    'repeating_item_type' => $repeatingItemTypeChar,
                    'priority' => $this->getPriorityFromItem($repeatingItemTypeChar)
                ]
            ];
        });


        $sum = $rucksacksWithCompartments->reduce(function($carry, $rucksack) {
            return $carry + $rucksack['priority'];
        });

        return $sum;
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $rucksacks = $dataProvider->toCollection();
        $rucksacks->transform(fn($game) => trim($game));

        $priorities = $rucksacks->chunk(3)->map(function ($group) {
            $repeatingCharacter = $this->findRepeatingCharacter($group->values());
            return $this->getPriorityFromItem($repeatingCharacter);
        });

        return $priorities->sum();
    }

    private function getPriorityFromItem(string $character): int
    {
        // lowercase
        if (ctype_lower($character)) {
            return ord($character) - 96; // ajdust for numbers between 1 - 26
        }

        // uppercase
        return ord($character) - 38; // adjust for numbers between 27 - 52
    }

    private function findRepeatingCharacter($group): string
    {
        $characterArray = array_unique(array_intersect(str_split($group[0]), str_split($group[1]), str_split($group[2])));
        return array_values($characterArray)[0];
    }
}