<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayFive;

it('is working for test data', function () {
    $dayFive = new DayFive();
    $dataProvider = new TestDataProvider(DayFive::class);
    $result = $dayFive->partOne($dataProvider);
    expect($result)->toEqual('CMZ');
});

it('is working for real data', function () {
    $dayFive = new DayFive();
    $dataProvider = new DataProvider(DayFive::class);
    $result = $dayFive->partOne($dataProvider);
    expect($result)->toEqual('FZCMJCRHZ');
});

it('part two is working for test data', function () {
    $dayFive = new DayFive();
    $dataProvider = new TestDataProvider(DayFive::class);
    $result = $dayFive->partTwo($dataProvider);
    expect($result)->toEqual('MCD');
});

it('part two is working for real data', function () {
    $dayFive = new DayFive();
    $dataProvider = new DataProvider(DayFive::class);
    $result = $dayFive->partTwo($dataProvider);
    expect($result)->toEqual('JSDHQMZGF');
});