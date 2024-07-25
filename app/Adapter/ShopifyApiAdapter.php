<?php

namespace App\Adapter;

use App\Adapter\ShopifyApi;
use Carbon\Carbon;

class ShopifyApiAdapter implements FeedAdapterInterface
{
    public function __construct(public ShopifyApi $api) {}
 
    public function getFeed(): array
    {
        return array_map(
            fn (array $item) => [
                'title' => $item['title'],
                'type' => 'Shopify',
                'date' => Carbon::parse($item['date'])->format('Y-m-d H:i:s'),
                'img' => $item['image'],
                'url' => $item['url'],
            ],
            $this->api->fetchItems(), // <==
        );
    }
}