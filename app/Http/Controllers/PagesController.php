<?php

namespace App\Http\Controllers;

use App\Services\Ravelry;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
// 'home'
// 'designs'
// 'news'
// 'about'
    public function home()
    {
        Cache::forget('products');
        $products = Cache::remember('products', 86400, function () {
            return Ravelry::getRavelryProducts();
        });

        $favorites = [
            642413, //7
            698425, //0
            634404  //9
        ];
        $keys = array_column($products, 'id');
        $favoriteProducts = [];

        foreach ($favorites as $favorite) {
            $key = array_search($favorite, $keys);
            array_push($favoriteProducts, $products[$key]);
        }

        $products = $favoriteProducts;

        return view('main.home', compact('products'));
    }

    public function designs()
    {
        Cache::forget('products');
        $products = Cache::remember('products', 86400, function () {
            return Ravelry::getRavelryProducts();
        });

        return view('main.designs', compact('products'));
    }

    public function news()
    {
        return view('main.news');
    }

    public function about()
    {
        return view('main.about');
    }

    public function contact()
    {
        return view('main.contact');
    }
}
