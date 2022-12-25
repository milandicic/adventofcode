<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DaySix;

it('is working for test data', function () {
    $daySix = new DaySix();
    $dataProvider = new TestDataProvider(DaySix::class);
    $result = $daySix->partOne($dataProvider);
    expect($result)->toEqual(7);
});

it('is working for real data', function () {
    $daySix = new DaySix();
    $dataProvider = new DataProvider(DaySix::class);
    $result = $daySix->partOne($dataProvider);
    expect($result)->toEqual(1109);
});

it('part two is working for test data', function () {
    $daySix = new DaySix();
    $dataProvider = new TestDataProvider(DaySix::class);
    $result = $daySix->partTwo($dataProvider);
    expect($result)->toEqual(19);
});

it('part two is working for real data', function () {
    $daySix = new DaySix();
    $dataProvider = new DataProvider(DaySix::class);
    $result = $daySix->partTwo($dataProvider);
    expect($result)->toEqual(3965);
});