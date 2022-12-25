<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;

class DayOne implements AdventOfCodeInterface
{
    public function partOne(DataProviderAbstract $dataProvider)
    {
        $result = $dataProvider->toCollection();

        $result->transform(fn($item) => trim($item));

        $results = $result->chunkWhile(function($value) {
            return $value !== '';
        });

        $results = $results->map(function($result) {
            return $result->reject(fn($item) => $item === '');
        });

        $results = $results->map(function($result) {
            return $result->reduce(function($carry, $item) {
                return $carry + $item;
            });
        });

        return $results->max();
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $result = $dataProvider->toCollection();

        $result->transform(fn($item) => trim($item));

        $results = $result->chunkWhile(function($value, $key, $chunk) {
            return $value !== '';
        });

        $results = $results->map(function($result) {
            return $result->reject(fn($item) => $item === '');
        });

        $results = $results->map(function($result) {
            return $result->reduce(function($carry, $item) {
                return $carry + $item;
            });
        });

        // sort results descending
        $results = $results->sort()->reverse();

        // take first 3
        $results = $results->values()->take(3);

        // and sum them
        return $results->sum();
    }
}