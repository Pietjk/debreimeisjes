<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'description' => ['required', 'string']
        ]);

        $post->update($validated);

        session()->flash('success', 'ik ben een coole jonge');
        return redirect('/');
    }
}
