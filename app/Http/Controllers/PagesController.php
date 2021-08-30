<?php

namespace App\Http\Controllers;

use App\Services\Ravelry;

use Illuminate\Http\Request;

class PagesController extends Controller
{
// 'home'
// 'designs'
// 'news'
// 'about'

    public function home()
    {

        $favorites = [
            642413, //7
            698425, //0
            634404  //9
        ];

        $products = Ravelry::getProducts($cached = true)->whereIn('id', $favorites)->random(3);

        return view('main.home', compact('products'));
    }

    public function designs()
    {
        $products = Ravelry::getProducts($cached = true);

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
