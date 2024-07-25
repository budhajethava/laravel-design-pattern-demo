<?php

namespace App\Adapter;

use App\Adapter\ShopifyApi;
use Carbon\Carbon;

class BigCommerceApiAdapter implements FeedAdapterInterface
{
    public function __construct(public BigCommerceApi $api) {}
 
    public function getFeed(): array
    {
        return array_map(
            fn (array $item) => [
                'title' => $item['name'],
                'type' => 'BigCommerce',
                'date' => Carbon::parse($item['published_at'])->format('Y-m-d H:i:s'),
                'img' => $item['picture_url'],
                'url' => $item['url'],
            ],
            $this->api->getProducts(), // <==
        );
    }
}