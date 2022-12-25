<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayOne;

it('is working for test data', function () {
    $dayOne = new DayOne();
    $dataProvider = new TestDataProvider(DayOne::class);
    $result = $dayOne->partOne($dataProvider);
    expect($result)->toEqual(24000);
});

it('is working for real data', function () {
    $dayOne = new DayOne();
    $dataProvider = new DataProvider(DayOne::class);
    $result = $dayOne->partOne($dataProvider);
    expect($result)->toEqual(70613);
});

it('part two is working for test data', function () {
    $dayOne = new DayOne();
    $dataProvider = new TestDataProvider(DayOne::class);
    $result = $dayOne->partTwo($dataProvider);
    expect($result)->toEqual(45000);
});

it('part two is working for real data', function () {
    $dayOne = new DayOne();
    $dataProvider = new DataProvider(DayOne::class);
    $result = $dayOne->partTwo($dataProvider);
    expect($result)->toEqual(205805);
});