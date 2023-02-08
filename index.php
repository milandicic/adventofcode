<?php

use Adventofcode\TestDataProvider;
use Adventofcode\Year2022\DayEleven\DayEleven;

include_once 'vendor/autoload.php';

//echo "<a href='raycast://confetti'>Confetti</a>";

$dayEleven = new DayEleven();
$dataProvider = new \Adventofcode\DataProvider(DayEleven::class);

echo $dayEleven->partTwo($dataProvider);