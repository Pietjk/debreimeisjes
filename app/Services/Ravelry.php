<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class Ravelry
{
    protected static function apiGet($url)
    {
        $username = config('services.ravelry.username');
        $key = config('services.ravelry.key');
        $url = "https://api.ravelry.com/".$url;
        return Http::withBasicAuth($username, $key)->get($url)->json();
    }

    public static function getProducts($cached = false)
    {
        if ($cached)
        {
            $products = Cache::remember('products', 86400, function () {
                            return self::getProducts($cached = false)->toArray();
                        });

        } else {
            $products = self::apiGet('stores/82998/products.json')['products'];

            array_walk(
                $products,
                function(&$product) {
                    $product['square_thumbnail_url'] = str_replace('http://images4.ravelry', 'https://images4-f.ravelrycache', $product['square_thumbnail_url']);
                }
            );
        }
        return collect($products);
    }
}
