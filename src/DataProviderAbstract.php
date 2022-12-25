<?php

namespace Adventofcode;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class DataProviderAbstract
{
    protected abstract function className(): string;
    protected abstract function dataDirectoryName(): string;

    public function toArray(): array
    {
        return file($this->getDataFile(), FILE_IGNORE_NEW_LINES);
    }

    public function toString(): string
    {
        return file_get_contents($this->getDataFile());
    }

    public function toCollection(): Collection
    {
        return collect(file($this->getDataFile(), FILE_IGNORE_NEW_LINES));
    }

    private function getDirectoryAndFileName(): array
    {
        $path = Str::of($this->className())->remove(__NAMESPACE__ . '\\');

        return explode('\\', $path);
    }

    public function getDataFile(): string
    {
        [$directory, $fileName] = $this->getDirectoryAndFileName();

        return __DIR__ . '/' . $directory . '/'. $this->dataDirectoryName() .'/' . $fileName . '.txt';
    }
}