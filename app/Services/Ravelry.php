<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class Ravelry
{
    public static function getRavelryProducts()
    {
        $username = config('services.ravelry.username');
        $key = config('services.ravelry.key');
        $url = "https://api.ravelry.com/stores/82998/products.json";
        return $response = Http::withBasicAuth($username, $key)->get($url)->json()['products'];
    }
}
