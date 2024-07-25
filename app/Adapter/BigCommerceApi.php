<?php

namespace App\Adapter;

use Carbon\Carbon;

class BigCommerceApi
{
    public function getProducts(): array {
        // returns an array of products tha have 'name', 'published_at', 'picture_url', 'url'
        return [
            [
                'name' => 'BigCommerce Product 1',
                'published_at' => Carbon::today(),
                'picture_url' => 'https://picsum.photos/200/300',
                'url' => 'https://picsum.photos/'
            ],
            [
                'name' => 'BigCommerce Product 2',
                'published_at' => Carbon::today(),
                'picture_url' => 'https://picsum.photos/200',
                'url' => 'https://picsum.photos/'
            ],
            [
                'name' => 'BigCommerce Product 3',
                'published_at' => Carbon::today(),
                'picture_url' => 'https://picsum.photos/id/237/200/300',
                'url' => 'https://picsum.photos/'
            ]
        ];
    }
}