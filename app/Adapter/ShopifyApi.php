<?php

namespace App\Adapter;

use Carbon\Carbon;

class ShopifyApi
{
    public function fetchItems(): array {
        // Returns an  `array` of products, that hold a `title`, `date`, `image` and `url`.
        return [
            [
                'title' => 'Shopify Product A',
                'date' => Carbon::yesterday(),
                'image' => 'https://picsum.photos/200/300',
                'url' => 'https://picsum.photos/'
            ],
            [
                'title' => 'Shopify Product B',
                'date' => Carbon::yesterday(),
                'image' => 'https://picsum.photos/200',
                'url' => 'https://picsum.photos/'
            ],
            [
                'title' => 'Shopify Product C',
                'date' => Carbon::yesterday(),
                'image' => 'https://picsum.photos/id/237/200/300',
                'url' => 'https://picsum.photos/'
            ]
        ];
    }
}