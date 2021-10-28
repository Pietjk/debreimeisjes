@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        @include('components._messages')
    @endauth
    <h3 class="text-primary">{{ $post->title }}@auth <a href="{{ route('post.edit', $post) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
    {!! App\Services\Text::nl2p($post->description) !!}
    <hr class="text-primary">
    @auth
        <a href="{{ route('news.create') }}" class="btn btn-secondary btn-lg mb-3"><i class="fas fa-plus"></i> Maak een nieuwsbericht</a>
    @endauth
    <div class="row">
        @each('components._news', $newsposts, 'news')
    </div>
</div>
@endsection
