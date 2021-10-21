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
        $welcomeDescription = Text::nl2p($welcome->description);

        $pattern = $posts->where('locator', '=', 'hPattern')->first();
        $patternDescription = Text::nl2p($pattern->description);

        $news = $posts->where('locator', '=', 'hNews')->first();

        return view('main.home', compact('products', 'favorites', 'welcome', 'welcomeDescription', 'pattern', 'patternDescription', 'news'));
    }

    public function designs()
    {
        $favorites = Product::pluck('ravelry_id');
        $products = Ravelry::getProducts($cached = true);

        $text = Post::where('locator', '=', 'mPattern')->first();
        $description = Text::nl2p($text->description);

        return view('main.designs', compact('text', 'description', 'products', 'favorites'));
    }

    public function news()
    {
        $text = Post::where('locator', '=', 'mNews')->first();
        $description = Text::nl2p($text->description);
        $newsposts =  News::all()->sortBy('created_at');

        return view('main.news', compact('text', 'description', 'newsposts'));
    }

    public function about()
    {
        $about = About::first();
        return view('main.about', compact('about'));
    }

    public function contact()
    {
        $text = Post::where('locator', '=', 'mContact')->first();
        $description = Text::nl2p($text->description);

        return view('main.contact', compact('text', 'description'));
    }
}
