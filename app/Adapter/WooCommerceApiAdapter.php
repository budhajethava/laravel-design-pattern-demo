<?php

namespace App\Adapter;

use App\Adapter\ShopifyApi;
use Carbon\Carbon;

class WooCommerceApiAdapter implements FeedAdapterInterface
{
    public function __construct(public WooCommerceApi $api) {}
 
    public function getFeed(): array
    {
        return array_map(
            fn (array $item) => [
                'title' => $item['name'],
                'type' => 'WooCommerce',
                'date' => Carbon::parse($item['published_date'])->format('Y-m-d H:i:s'),
                'img' => $item['cover'],
                'url' => $item['link'],
            ],
            $this->api->getList(), // <==
        );
    }
}