<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayFour;

it('is working for test data', function () {
    $dayFour = new DayFour();
    $dataProvider = new TestDataProvider(DayFour::class);
    $result = $dayFour->partOne($dataProvider);
    expect($result)->toEqual(2);
});

it('is working for real data', function () {
    $dayFour = new DayFour();
    $dataProvider = new DataProvider(DayFour::class);
    $result = $dayFour->partOne($dataProvider);
    expect($result)->toEqual(542);
});

it('part two is working for test data', function () {
    $dayFour = new DayFour();
    $dataProvider = new TestDataProvider(DayFour::class);
    $result = $dayFour->partTwo($dataProvider);
    expect($result)->toEqual(4);
});

it('part two is working for real data', function () {
    $dayFour = new DayFour();
    $dataProvider = new DataProvider(DayFour::class);
    $result = $dayFour->partTwo($dataProvider);
    expect($result)->toEqual(900);
});