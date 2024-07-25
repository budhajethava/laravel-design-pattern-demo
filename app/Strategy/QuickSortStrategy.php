<?php
namespace App\Strategy;

use App\Strategy\SortingStrategy;

class QuickSortStrategy implements SortingStrategy
{
    public function sort(array $items): array
    {
        info('QuickSort started---');
        if (count($items) <= 1) {
            return $items;
        }

        $pivot = array_shift($items);
        $left = $right = array();
        foreach ($items as $item) {
            if ($item < $pivot) {
                $left[] = $item;
            } else {
                $right[] = $item;
            }
        }
        info('QuickSort completed---');
        return array_merge($this->sort($left), array($pivot), $this->sort($right));
    }
}
