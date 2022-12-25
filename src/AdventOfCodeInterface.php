<?php

namespace Adventofcode;

interface AdventOfCodeInterface
{
    public function partOne(DataProviderAbstract $dataProvider);
    public function partTwo(DataProviderAbstract $dataProvider);
}