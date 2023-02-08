<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayTen;

it('is working for test data', function () {
    $dayTen = new DayTen();
    $dataProvider = new TestDataProvider(DayTen::class);
    $result = $dayTen->partOne($dataProvider);
    expect($result)->toEqual(13140);
});

it('is working for real data', function () {
    $dayTen = new DayTen();
    $dataProvider = new DataProvider(DayTen::class);
    $result = $dayTen->partOne($dataProvider);
    expect($result)->toEqual(13680);
});

it('part two is working for test data', function () {
    $dayTen = new DayTen();
    $dataProvider = new TestDataProvider(DayTen::class);
    $result = $dayTen->partTwo($dataProvider);
    expect($result)->toEqual('PZGPKPEB');
});

it('part two is working for real data', function () {
    $dayTen = new DayTen();
    $dataProvider = new DataProvider(DayTen::class);
    $result = $dayTen->partTwo($dataProvider);
    expect($result)->toEqual('PZGPKPEB');
});
