<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayEleven\DayEleven;

it('is working for test data', function () {
    $dayEleven = new DayEleven();
    $dataProvider = new TestDataProvider(DayEleven::class);
    $result = $dayEleven->partOne($dataProvider);
    expect($result)->toEqual(10605);
});

it('is working for real data', function () {
    $dayEleven = new DayEleven();
    $dataProvider = new DataProvider(DayEleven::class);
    $result = $dayEleven->partOne($dataProvider);
    expect($result)->toEqual(69918);
});

it('part two is working for test data', function () {
    $dayEleven = new DayEleven();
    $dataProvider = new TestDataProvider(DayEleven::class);
    $result = $dayEleven->partTwo($dataProvider);
    expect($result)->toEqual(2713310158);
});

it('part two is working for real data', function () {
    $dayEleven = new DayEleven();
    $dataProvider = new DataProvider(DayEleven::class);
    $result = $dayEleven->partTwo($dataProvider);
    expect($result)->toEqual(19573408701);
});