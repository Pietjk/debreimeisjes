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
        if ($cached && ! request()->has('refresh'))
        {
            $products = array_reverse(Cache::remember('products', 86400, function () {
                            return self::getProducts($cached = false)->toArray();
                        })['patterns'], true);
        } else {
            $ids = array_filter(collect(self::apiGet('stores/82998/products.json')['products'])->map(function ($item) {
                if (!is_null($item['square_thumbnail_url']) && !is_null($item['designer_photos_count'])) {
                    return str_replace('AS-', '', $item['sku']);
                }
            })->toArray());

            $products = array_reverse(self::apiGet('patterns.json?ids='.implode('+', $ids))['patterns'], true);
        }
        
        return collect($products);
    }
}
