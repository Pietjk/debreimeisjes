@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            @include('components._messages')
        @endauth
        <h3 class="text-primary">{{ $post->title }}@auth <a href="{{ route('post.edit', $post) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
        {!! App\Services\Text::nl2p($post->description) !!}
        <hr class="text-primary">
        @foreach ($products as $product)
            @include('components._products', ['product' => $product, 'favorites' => $favorites])
        @endforeach
    </div>
@endsection
