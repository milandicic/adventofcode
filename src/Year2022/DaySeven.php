<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;
use Illuminate\Support\Str;

class DaySeven implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $instructions = $dataProvider->toArray();
        ray($instructions);

        $fileTree = ['/' => null];
        $currentDirectory = null;
        foreach ($instructions as $index => $instruction) {

            if ($this->isCd($instruction)) {
                ray($fileTree, $instruction);
                $currentDirectory = $fileTree[$this->cdDirectory($instruction)];
                ray($currentDirectory, $this->cdDirectory($instruction))->green();
            }

            if ($this->isLs($instruction)) {
                $fileTree[$currentDirectory] = $this->getDirectoryContent($index, $fileTree, $instructions);
            }
        }

//        [$instructions, $files] = $instructions->partition(fn($instruction) => $this->isCommand($instruction));

        ray($fileTree)->orange();

        return 5;
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        // TODO: Implement partTwo() method.
    }

    private function isCommand(string $line): bool
    {
        return Str::of($line)->startsWith('$');
    }

    private function isLs(string $line): bool
    {
        return Str::of($line)->startsWith('$ ls');
    }

    private function isCd(string $line): bool
    {
        return Str::of($line)->startsWith('$ cd');
    }

    private function isDirectory(string $line): bool
    {
        return Str::of($line)->startsWith('dir');
    }

    private function cdDirectory(string $line): string
    {
        return Str::of($line)->remove('$ cd ');
    }

    private function dirDirectory(string $line): string
    {
        return Str::of($line)->remove('dir ');
    }

    private function getFileSizeAndName(string $line): array
    {
        return Str::of($line)->explode(' ')->toArray();
    }

    private function getDirectoryContent(int $index, array $fileTree, array $instructions): array
    {
        $lineIndex = $index + 1;
        $directoryLine = $instructions[$lineIndex];
        $directoryContent = [];

        while (!$this->isCommand($directoryLine) && $lineIndex < count($instructions)) {
            if ($this->isDirectory($directoryLine)) {
                // add directory
                $directoryContent = $directoryContent + [$this->dirDirectory($directoryLine) => null];
            } else {
                // add file

                [$fileSize, $fileName] = $this->getFileSizeAndName($directoryLine);
                $directoryContent = $directoryContent + [$fileName => $fileSize];
            }

            $lineIndex++;
        }

        return $directoryContent;
    }
}