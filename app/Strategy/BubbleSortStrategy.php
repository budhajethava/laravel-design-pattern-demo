<?php

namespace App\Strategy;

use App\Strategy\SortingStrategy;

class BubbleSortStrategy implements SortingStrategy
{
    public function sort(array $items): array
    {
        info('Bublesort started---');
        $count = count($items);
        for ($i = 0; $i < $count; $i++) {
            for ($j = 0; $j < $count - $i - 1; $j++) {
                if ($items[$j] > $items[$j + 1]) {
                    $temp = $items[$j];
                    $items[$j] = $items[$j + 1];
                    $items[$j + 1] = $temp;
                }
            }
        }
        info('Bublesort completed---');
        return $items;
    }
}