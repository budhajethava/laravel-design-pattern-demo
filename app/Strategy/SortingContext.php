<?php
namespace App\Strategy;

use App\Strategy\SortingStrategy;
use App\Strategy\BubbleSortStrategy;
use App\Strategy\QuickSortStrategy;

class SortingContext
{
    private SortingStrategy $strategy;

    public function __construct(string $sortingStrategy)
    {
        switch ($sortingStrategy) {
            case 'bubblesort':
                $this->strategy = new BubbleSortStrategy();
                break;
            case 'quicksort':
                $this->strategy = new QuickSortStrategy();
                break;
            default:
                throw new \InvalidArgumentException('Invalid sorting!');
                break;
        }
    }

    public function sort($items)
    {
        return $this->strategy->sort($items);
    }
}