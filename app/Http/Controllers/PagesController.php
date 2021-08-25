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
        return view('main.home');
    }

    public function designs(Request $request)
    {
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
