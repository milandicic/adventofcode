<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayEight;

it('is working for test data', function () {
    $dayEight = new DayEight();
    $dataProvider = new TestDataProvider(DayEight::class);
    $result = $dayEight->partOne($dataProvider);
    expect($result)->toEqual(21);
});

it('is working for real data', function () {
    $dayEight = new DayEight();
    $dataProvider = new DataProvider(DayEight::class);
    $result = $dayEight->partOne($dataProvider);
    expect($result)->toEqual(1662);
});

it('part two is working for test data', function () {
    $dayEight = new DayEight();
    $dataProvider = new TestDataProvider(DayEight::class);
    $result = $dayEight->partTwo($dataProvider);
    expect($result)->toEqual(8);
});

it('part two is working for real data', function () {
    $dayEight = new DayEight();
    $dataProvider = new DataProvider(DayEight::class);
    $result = $dayEight->partTwo($dataProvider);
    expect($result)->toEqual(537600);
});