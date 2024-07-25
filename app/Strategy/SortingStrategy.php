<?php

namespace App\Strategy;

interface SortingStrategy
{
    public function sort(array $items): array;
}