@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            @include('components._messages')
        @endauth
        <h3 class="text-primary">{{ $text->title }}@auth <a href="{{ route('post.edit', $text) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
        {!! $description !!}
        <hr class="text-primary">
        @foreach ($products as $product)
            @include('components._products', ['product' => $product, 'favorites' => $favorites])
        @endforeach
    </div>
@endsection
