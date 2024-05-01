<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'text' => ['required', 'string', 'min:3'],
            'image' => ['nullable', 'image', 'max:5000'],
        ]);

        unset($validated['image']);

        if ($request->file('image') !== null)
        {
            $image = str_replace('storage/', '', $about->image_path);
            Storage::disk('public')->delete($image);

            $path = $request->file('image')->store(
                'images',
                'public'
            );
            $validated['image_path'] = 'storage/'.$path;
        }

        $about->update($validated);

        session()->flash('success', 'De over ons pagina is aangepast');
        return redirect(route('main.about'));
    }
}
