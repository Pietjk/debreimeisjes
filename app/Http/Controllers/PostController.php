<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;

class PostController extends Controller
{
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3', 'max:255', 'string'],
            'description' => ['string', 'nullable', Rule::requiredIf($post->locator !== 'hNews')]
        ]);

        $post->update($validated);

        session()->flash('success', 'Post aangemaakt');
        return redirect('/');
    }
}
