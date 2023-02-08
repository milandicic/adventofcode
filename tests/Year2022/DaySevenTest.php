<?php

use Adventofcode\DataProvider;
use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DaySeven;

it('is working for test data', function () {
    $daySeven = new DaySeven();
    $dataProvider = new TestDataProvider(DaySeven::class);
    $result = $daySeven->partOne($dataProvider);
    expect($result)->toEqual(95437);
});

//it('is working for real data', function () {
//    $daySeven = new DaySeven();
//    $dataProvider = new DataProvider(DaySeven::class);
//    $result = $daySeven->partOne($dataProvider);
//    expect($result)->toEqual(1109);
//});

//it('part two is working for test data', function () {
//    $daySeven = new DaySeven();
//    $dataProvider = new TestDataProvider(DaySeven::class);
//    $result = $daySeven->partTwo($dataProvider);
//    expect($result)->toEqual(19);
//});

//it('part two is working for real data', function () {
//    $daySeven = new DaySeven();
//    $dataProvider = new DataProvider(DaySeven::class);
//    $result = $daySeven->partTwo($dataProvider);
//    expect($result)->toEqual(3965);
//});
