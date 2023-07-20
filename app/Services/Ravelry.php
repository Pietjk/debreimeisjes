<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;

class Ravelry
{
    protected static function apiGet($url)
    {
        // $id = 1340628;
        // $url =  "/patterns/{$id}.json";

        $username = config('services.ravelry.username');
        $key = config('services.ravelry.key');
        $url = "https://api.ravelry.com/".$url;
        // dd(Http::withBasicAuth($username, $key)->get($url)->json());
        return Http::withBasicAuth($username, $key)->get($url)->json();
    }

    public static function getProducts($cached = false)
    {
        $ids = array_filter(collect(self::apiGet('stores/82998/products.json')['products'])->map(function ($item) {
            if (!is_null($item['square_thumbnail_url']) && !is_null($item['designer_photos_count'])) {
                return str_replace('AS-', '', $item['sku']);
            }
        })->toArray());

        $patterns = self::apiGet('patterns.json?ids='.implode('+', $ids));

        dd($patterns);

        if ($cached && ! request()->has('refresh'))
        {
            $products = Cache::remember('products', 86400, function () {
                            return self::getProducts($cached = false)->toArray();
                        });
        } else {
            $allProducts = collect(self::apiGet('stores/82998/products.json')['products']);
            $products = $allProducts->reject(function($product, $key) {
                return is_null($product['square_thumbnail_url']);
            })->toArray();
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
