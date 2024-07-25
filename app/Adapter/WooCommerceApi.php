<?php

namespace App\Adapter;

use Carbon\Carbon;

class WooCommerceApi
{
    public function getList(): array {
        // returns an array of products tha have 'name', 'published_date', 'cover', 'link'
        return [
            [
                'name' => 'WooCommerce Product AA',
                'published_date' => Carbon::tomorrow(),
                'cover' => 'https://picsum.photos/200/300',
                'link' => 'https://picsum.photos/'
            ],
            [
                'name' => 'WooCommerce Product BB',
                'published_date' => Carbon::tomorrow(),
                'cover' => 'https://picsum.photos/200',
                'link' => 'https://picsum.photos/'
            ],
            [
                'name' => 'WooCommerce Product CC',
                'published_date' => Carbon::tomorrow(),
                'cover' => 'https://picsum.photos/id/237/200/300',
                'link' => 'https://picsum.photos/'
            ]
        ];
    }
}