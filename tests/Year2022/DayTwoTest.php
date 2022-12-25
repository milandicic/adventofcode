<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayTwo;


it('is working for test data', function () {
    $dayTwo = new DayTwo();
    $dataProvider = new TestDataProvider(DayTwo::class);
    $result = $dayTwo->partOne($dataProvider);
    expect($result)->toEqual(15);
});

it('is working for real data', function () {
    $dayTwo = new DayTwo();
    $dataProvider = new DataProvider(DayTwo::class);
    $result = $dayTwo->partOne($dataProvider);
    expect($result)->toEqual(12772);
});

it('part two is working for test data', function () {
    $dayTwo = new DayTwo();
    $dataProvider = new TestDataProvider(DayTwo::class);
    $result = $dayTwo->partTwo($dataProvider);
    expect($result)->toEqual(12);
});

it('part two is working for real data', function () {
    $dayTwo = new DayTwo();
    $dataProvider = new DataProvider(DayTwo::class);
    $result = $dayTwo->partTwo($dataProvider);
    expect($result)->toEqual(11618);
});