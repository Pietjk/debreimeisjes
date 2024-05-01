<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'text' => ['required', 'string', 'min:3'],
            'blog_link' => ['required', 'url'],
            'news_link' => ['nullable', 'url'],
            'image' => ['required', 'image', 'max:5000'],
        ]);

        unset($validated['image']);

        $path = $request->file('image')->store(
            'images',
            'public'
        );
        $validated['image_path'] = 'storage/'.$path;

        News::create($validated);

        session()->flash('success', 'Nieuws aangemaakt');
        return redirect(route('main.news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'text' => ['required', 'string', 'min:3'],
            'blog_link' => ['required', 'url'],
            'news_link' => ['nullable', 'url'],
            'image' => ['nullable', 'image', 'max:200'],
        ]);

        unset($validated['image']);

        if ($request->file('image') !== null)
        {
            $image = str_replace('storage/', '', $news->image_path);
            Storage::disk('public')->delete($image);

            $path = $request->file('image')->store(
                'images',
                'public'
            );
            $validated['image_path'] = 'storage/'.$path;
        }

        $news->update($validated);

        session()->flash('success', 'Nieuws aangepast');
        return redirect(route('main.news'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $image = str_replace('storage/', '', $news->image_path);
        Storage::disk('public')->delete($image);
        $news->delete();
        session()->flash('success', 'Nieuws verwijderd');
        return back();
    }
}
