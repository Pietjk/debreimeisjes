<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\News;
use App\Models\About;
use App\Services\Ravelry;
use App\Services\Text;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function home()
    {
        $favorites = Product::pluck('ravelry_id');

        $products = Ravelry::getProducts($cached = true)->whereIn('id', $favorites);

        $latestNews =  News::latest()->first();

        $posts = Post::all();
        $welcome = $posts->where('locator', '=', 'hWelcome')->first();

        $pattern = $posts->where('locator', '=', 'hPattern')->first();

        $news = $posts->where('locator', '=', 'hNews')->first();

        return view('main.home', compact('products', 'favorites', 'latestNews', 'welcome', 'pattern', 'news'));
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
        $newsposts =  News::all()->sortByDesc('created_at');

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

    public function update_header(Request $request)
    {
        $request->validate([
            'header' => ['sometimes', 'image', 'mimes:jpg', 'max:5000'],
        ]);

        if ($request->has('header')) {
            $request->file('header')->storeAs(
                'images',
                'header.jpg',
                'public'
            );
        } elseif (Storage::disk('public')->fileExists('images/header.jpg')) {
            Storage::disk('public')->delete('images/header.jpg');
        }

        return redirect()->back();
    }
}
