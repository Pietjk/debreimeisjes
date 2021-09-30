@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components._messages')
        <h3 class="text-primary">Pas "{{ $post->title }}" aan</h3>
        <hr>
        <form action="{{ route('post.update', $post) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label class="form-label">Titel</label>
                <input name="title" type="text" class="form-control" placeholder="Titel" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Tekst</label>
                <textarea name="description" class="form-control" rows="5" placeholder="Verhaal">{{ $post->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Pas aan</button>
        </form>
    </div>
@endsection
