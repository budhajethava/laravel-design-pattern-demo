<?php

namespace App\Adapter;

interface FeedAdapterInterface
{
    /**
     * @return array<int, array<string, string>>
     */
    public function getFeed(): array;
}