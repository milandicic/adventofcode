<?php

namespace Adventofcode\Year2022\DayEleven;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
class Monkey
{
    /**
     * @var Monkey[]
     */
    public static array $monkeys;

    public string $name;

    public Collection $items;
    public int $divisibleBy;
    public string $monkeyNameIfTrue;
    public string $monkeyNameIfFalse;

    public string $operation;

    public bool $applyRelief = true;

    public int $numberOfInspections = 0;

    public function __construct(Collection $monkeyData)
    {
        $this->parseMonkeyData($monkeyData);
    }

    public function doTheMonkeyBusiness(): void
    {
        $this->items->each(function () {
            // get first item
            $item = $this->items->shift();

            // inspect it with the operation
            $item = $this->inspect($item);

            // apply relief if needed
            if ($this->applyRelief) {
                $item = floor($item / 3);
            } else {
                /**
                 * For part two without a relief item worry levels goes exponentinally high
                 * so that we overflow integer max value rapidly, in order to fix this problem
                 * as it's being hinted, we need to find some way to apply some kind of relief
                 * without afecting the number divisibility. In order to do that we need to
                 * perform modulus with all dividers multiplied, that trick will reduce our numbers
                 * drastically without messing up divisibility of item worry levels
                 * more info: https://tranzystorek-io.github.io/paste/#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
                 */
                $item = $item % self::getAllDivisors();
            }

            // throw
            $this->throwItem($item);
        });
    }

    public function catchItem(int $item): void
    {
        $this->items->push($item);
    }

    public function withoutRelief()
    {
        $this->applyRelief = false;

        return $this;
    }

    protected function throwItem(int $item): void
    {
        if ($item % $this->divisibleBy === 0) {
            $monkey = self::getMonkeyByName($this->monkeyNameIfTrue);
            $monkey->catchItem($item);
        } else {
            $monkey = self::getMonkeyByName($this->monkeyNameIfFalse);
            $monkey->catchItem($item);
        }
    }

    protected function inspect(int $item)
    {
        $this->numberOfInspections++;

        return eval("return {$this->operation};");
    }

    public static function getMonkeyByName(string $name): ?self
    {
        foreach (self::$monkeys as $monkey) {
            if ($monkey->name === $name) {
                return $monkey;
            }
        }

        return null;
    }

    public static function levelOfMonkeyBusiness(): int
    {
        $inspections = [];
        foreach (self::$monkeys as $monkey) {
            $inspections[] = $monkey->numberOfInspections;
        }

        rsort($inspections);

        return $inspections[0] * $inspections[1];
    }

    // for part two only
    protected static function getAllDivisors(): int
    {
        $allDivisors = 1;
        foreach (self::$monkeys as $monkey) {
            $allDivisors *= $monkey->divisibleBy;
        }

        return $allDivisors;
    }

    protected function parseMonkeyData(Collection $monkeyData): void
    {
        $this->name = Str::of($monkeyData->get(0))->remove(['Monkey ', ':']);
        $this->items = Str::of($monkeyData->get(1))
            ->remove(['Starting items: '])
            ->trim()
            ->explode(', ')
            ->map(fn($item) => (int)$item);
        $this->divisibleBy = Str::of($monkeyData->get(3))
            ->remove('Test: divisible by ')
            ->trim()
            ->toInteger();
        $this->monkeyNameIfTrue = Str::of($monkeyData->get(4))
            ->remove(['If true: throw to monkey '])
            ->trim();
        $this->monkeyNameIfFalse = Str::of($monkeyData->get(5))
            ->remove(['If false: throw to monkey '])
            ->trim();
        $this->operation = Str::of($monkeyData->get(2))
            ->trim()
            ->remove(['Operation: new = '])
            ->replace('old', '$item');
    }
}