<?php

namespace Adventofcode;

class TestDataProvider extends DataProviderAbstract
{
    public function __construct(private string $className)
    {
    }

    protected function className(): string
    {
        return $this->className;
    }

    protected function dataDirectoryName(): string
    {
        return 'TestData';
    }
}