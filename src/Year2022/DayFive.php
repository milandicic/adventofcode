<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;
use Illuminate\Support\Collection;

class DayFive implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider): string
    {
        $stacks = $dataProvider->toCollection();

        $initialState = $stacks->takeWhile(fn($row) => $row !== "");
        $instructions = $stacks->skipWhile(fn($row) => $row !== "")->skip(1);

        $stacks = $this->loadStacks($initialState);
        $parsedInstructions = $this->parseInstructions($instructions);

        foreach($parsedInstructions->toArray() as $instruction) {
            foreach(range(1, $instruction['move']) as $iteration) {
                $this->moveOneCrateFromTo($stacks, $instruction['from'], $instruction['to']);
            }
        }

        return $this->getTopCrates($stacks);
    }

    public function partTwo(DataProviderAbstract $dataProvider): string
    {
        $stacks = $dataProvider->toCollection();

        $initialState = $stacks->takeWhile(fn($row) => $row !== "");
        $instructions = $stacks->skipWhile(fn($row) => $row !== "")->skip(1);

        $stacks = $this->loadStacks($initialState);
        $parsedInstructions = $this->parseInstructions($instructions);

        foreach($parsedInstructions->toArray() as $instruction) {
            $stacks = $this->moveCratesFromTo($stacks, $instruction);
        }

        return $this->getTopCrates($stacks);
    }

    private function loadStacks(Collection $initialState): array
    {
        $columns = explode(' ', trim($initialState->last()));
        $numberOfColumns = collect($columns)->last();

        $cratesRows = $initialState->slice(0, -1);

        $stacks = [];

        foreach(range(1, $numberOfColumns) as $index) {
            $stacks[$index] = collect([]);
        }

        $cratesRows->reverse()->each(function($row) use ($numberOfColumns, &$stacks) {
            $explodedCrateRow = collect(str_split($row))
                ->chunk(4)
                ->pad($numberOfColumns, collect([]))
                ->map(function($row) {
                    return str_replace(['[', ']'], '', trim($row->implode('')));
                });

            foreach(range(1, $numberOfColumns) as $index) {
                if ($explodedCrateRow[$index-1] === "") {
                    continue;
                }

                $stacks[$index]->push($explodedCrateRow[$index-1]);
            }
        });

        return $stacks;
    }

    private function parseInstructions(Collection $instructions): Collection
    {
        return $instructions->map(function($instruction) {
            $explodedInst = explode(' ', $instruction);

            return [
                'move' => (int) $explodedInst[1],
                'from' => (int) $explodedInst[3],
                'to' => (int) $explodedInst[5]
            ];
        });
    }

    private function moveOneCrateFromTo(array &$stacks, int $from, int $to)
    {
        $crate = $stacks[$from]->pop();
        $stacks[$to]->push($crate);
    }

    private function getTopCrates(array $stacks): string
    {
        $crates = [];
        foreach ($stacks as $stack) {
            $crates[] = $stack->last();
        }

        return implode('', $crates);
    }

    private function moveCratesFromTo(array $stacks, array $instruction): array
    {
        $cratesToMove = $stacks[$instruction['from']]->splice(-$instruction['move']);
        $stacks[$instruction['to']] = $stacks[$instruction['to']]->merge($cratesToMove);
        return $stacks;
    }
}