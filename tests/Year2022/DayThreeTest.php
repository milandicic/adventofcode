<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayThree;

it('is working for test data', function () {
    $dayThree = new DayThree();
    $dataProvider = new TestDataProvider(DayThree::class);
    $result = $dayThree->partOne($dataProvider);
    expect($result)->toEqual(157);
});

it('is working for real data', function () {
    $dayThree = new DayThree();
    $dataProvider = new DataProvider(DayThree::class);
    $result = $dayThree->partOne($dataProvider);
    expect($result)->toEqual(8252);
});

it('part two is working for test data', function () {
    $dayThree = new DayThree();
    $dataProvider = new TestDataProvider(DayThree::class);
    $result = $dayThree->partTwo($dataProvider);
    expect($result)->toEqual(70);
});

it('part two is working for real data', function () {
    $dayThree = new DayThree();
    $dataProvider = new DataProvider(DayThree::class);
    $result = $dayThree->partTwo($dataProvider);
    expect($result)->toEqual(2828);
});