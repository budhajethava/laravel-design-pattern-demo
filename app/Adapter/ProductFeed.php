<?php

namespace App\Adapter;

class ProductFeed
{
    /**
     * @param FeedAdapterInterface[] $adapters
     */
    public function __construct(public mixed $adapters) {}
 
    public function getAllProducts(): iterable
    {
        $adapters= is_array($this->adapters) ? $this->adapters: func_get_args();

        foreach ($adapters as $adapter) {
            yield from $adapter->getFeed();
        }
    }
}