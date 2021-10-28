<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\News;
use App\Models\About;
use App\Services\Ravelry;
use App\Services\Text;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $favorites = Product::pluck('ravelry_id');

        $products = Ravelry::getProducts($cached = true)->whereIn('id', $favorites);

        $posts = Post::all();
        $welcome = $posts->where('locator', '=', 'hWelcome')->first();

        $pattern = $posts->where('locator', '=', 'hPattern')->first();

        $news = $posts->where('locator', '=', 'hNews')->first();

        return view('main.home', compact('products', 'favorites', 'welcome', 'pattern', 'news'));
    }

    public function designs()
    {
        $favorites = Product::pluck('ravelry_id');
        $products = Ravelry::getProducts($cached = true);

        $post = Post::where('locator', '=', 'mPattern')->first();

        return view('main.designs', compact('post', 'products', 'favorites'));
    }

    public function news()
    {
        $post = Post::where('locator', '=', 'mNews')->first();
        $newsposts =  News::all()->sortBy('created_at');

        return view('main.news', compact('post', 'newsposts'));
    }

    public function about()
    {
        $about = About::first();
        return view('main.about', compact('about'));
    }

    public function contact()
    {
        $post = Post::where('locator', '=', 'mContact')->first();

        return view('main.contact', compact('post'));
    }
}
