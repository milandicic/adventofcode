<?php

namespace Adventofcode\Year2022;

use Adventofcode\AdventOfCodeInterface;
use Adventofcode\DataProviderAbstract;

class DayEight implements AdventOfCodeInterface
{

    public function partOne(DataProviderAbstract $dataProvider)
    {
        $trees = $dataProvider->toArray();

        // Create tree matrix
        foreach($trees as $index => $treeRow) {
            $trees[$index] = str_split($treeRow);
        }

        $numberOfVisibleInnerTrees = 0;
        // Go trough all inner trees
        for ($i = 1; $i < count($trees) - 1; $i++) {
            for ($j = 1; $j < count($trees[$i]) - 1; $j++) {
                // for each of tree check up, right, down, left
                $visibility = [
                    $this->checkUp($trees, $i, $j),
                    $this->checkRight($trees, $i, $j),
                    $this->checkDown($trees, $i, $j),
                    $this->checkLeft($trees, $i, $j)
                ];

                $numberOfVisible = array_filter($visibility, fn($visible) => $visible);
                if (count($numberOfVisible) > 0) {
                    $numberOfVisibleInnerTrees++;
                }
            }
        }

        return $numberOfVisibleInnerTrees + $this->getNumberOfTreesOnTheBorder($trees);
    }

    public function partTwo(DataProviderAbstract $dataProvider)
    {
        $trees = $dataProvider->toArray();

        // Create tree matrix
        foreach($trees as $index => $treeRow) {
            $trees[$index] = str_split($treeRow);
        }

        $maxScenicScore = 0;
        // Go trough all inner trees
        for ($i = 1; $i < count($trees) - 1; $i++) {
            for ($j = 1; $j < count($trees[$i]) - 1; $j++) {
                // for each of tree check up, right, down, left
                $up = $this->checkUpScenic($trees, $i, $j);
                $right = $this->checkRightScenic($trees, $i, $j);
                $down = $this->checkDownScenic($trees, $i, $j);
                $left = $this->checkLeftScenic($trees, $i, $j);

                $scenicScore = $up * $right * $down * $left;
                if ($scenicScore > $maxScenicScore) {
                    $maxScenicScore = $scenicScore;
                }
            }
        }

        return $maxScenicScore;
    }

    private function checkUp(array $trees, int $row, int $column): bool
    {
        for ($i = $row - 1; $i >= 0; $i--) {
            if ($trees[$i][$column] >= $trees[$row][$column]) {
                return false;
            }
        }

        return true;
    }

    private function checkRight(array $trees, int $row, int $column): bool
    {
        for ($j = $column + 1; $j < count($trees[$row]); $j++) {
            if ($trees[$row][$column] <= $trees[$row][$j]) {
                return false;
            }
        }

        return true;
    }

    private function checkDown(array $trees, int $row, int $column): bool
    {
        for ($i = $row + 1; $i < count($trees); $i++) {
            if ($trees[$row][$column] <= $trees[$i][$column]) {
                return false;
            }
        }

        return true;
    }

    private function checkLeft(array $trees, int $row, int $column): bool
    {
        for ($j = $column - 1; $j >= 0; $j--) {
            if ($trees[$row][$column] <= $trees[$row][$j]) {
                return false;
            }
        }

        return true;
    }

    private function getNumberOfTreesOnTheBorder(array $trees): int
    {
        return count($trees[0]) * 2 + count($trees) * 2 - 4;
    }

    private function checkUpScenic(array $trees, int $row, int $column): int
    {
        $counter = 0;
        for ($i = $row - 1; $i >= 0; $i--) {
            $counter++;
            if ($trees[$i][$column] >= $trees[$row][$column]) {
                return $counter;
            }
        }

        return $row;
    }

    private function checkLeftScenic(array $trees, int $row, int $column): int
    {
        $counter = 0;
        for ($j = $column - 1; $j >= 0; $j--) {
            $counter++;
            if ($trees[$row][$column] <= $trees[$row][$j]) {
                return $counter;
            }
        }

        return $column;
    }

    private function checkRightScenic(array $trees, int $row, int $column): int
    {
        $counter = 0;
        for ($j = $column + 1; $j < count($trees[$row]); $j++) {
            $counter++;
            if ($trees[$row][$column] <= $trees[$row][$j]) {
                return $counter;
            }
        }

        return count($trees[0]) - $column - 1;
    }

    private function checkDownScenic(array $trees, int $row, int $column): int
    {
        $counter = 0;
        for ($i = $row + 1; $i < count($trees); $i++) {
            $counter++;
            if ($trees[$row][$column] <= $trees[$i][$column]) {
                return $counter;
            }
        }

        return count($trees) - $row - 1;
    }
}