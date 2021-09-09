<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
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
        $welcomeDescription = Text::createWhitespace($welcome->description);

        $pattern = $posts->where('locator', '=', 'hPattern')->first();
        $patternDescription = Text::createWhitespace($pattern->description);

        $news = $posts->where('locator', '=', 'hNews')->first();

        return view('main.home', compact('products', 'welcome', 'welcomeDescription', 'pattern', 'patternDescription', 'news'));
    }

    public function designs()
    {
        $products = Ravelry::getProducts($cached = true);

        $text = Post::where('locator', '=', 'mPattern')->first();
        $description = Text::createWhitespace($text->description);

        return view('main.designs', compact('text', 'products', 'description'));
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
        $text = Post::where('locator', '=', 'mContact')->first();
        $description = Text::createWhitespace($text->description);

        return view('main.contact', compact('text', 'description'));
    }
}
