<?php

namespace App\Http\Controllers;

use App\Models\Ravelry;

use Illuminate\Http\Request;

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

    public function designs()
    {
        dd(Ravelry::getRavelryData());
        return view('main.designs');
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
