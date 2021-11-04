@extends('layouts.app')

@section('content')
<div class="container">
    @include('components._messages')
    <h3 class="text-primary">{{ $welcome->title }}@auth <a href="{{ route('post.edit', $welcome) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
    {!! App\Services\Text::nl2p($welcome->description) !!}
    <h5 class="text-primary">Hier is mijn blog:</h5>
    <a href="https://debreimeisjes.blogspot.nl">debreimeisjes.blogspot.nl</a>
    <hr class="text-primary">

    <h3 class="text-primary">{{ $pattern->title }}@auth<a href="{{ route('post.edit', $pattern) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
    {!! App\Services\Text::nl2p($pattern->description) !!}
    @foreach ($products as $product)
        @include('components._products', ['product' => $product, 'favorites' => $favorites])
    @endforeach
    <a href="{{ route('main.designs') }}">Bekijk al mijn patronen hier</a>
    <hr class="text-primary">

    <h3 class="text-primary">{{ $news->title }}@auth <a href="{{ route('post.edit', $news) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
    @if (!isset($news))
        <div onclick="location.href='{{ route('main.news') }}'" class="card bg-primary mb-3" title="{{ route('main.news') }}">
            <div class="row products">
                <div class="col-3 col-sm-2 col-lg-1 align-self-center"><img src="{{ asset($latestNews->image_path) }}" alt="" height="75px" width="75px"></div>
                <div class="col-9 col-sm-10 col-lg-11 text-white align-self-center"><p>{{ $latestNews->title }}</p></div>
            </div>
        </div>
    @else
        @include('components._message', ['type' => 'info', 'message' => 'Er is nog geen nieuws', 'icon' => 'info-circle'])
    @endif
    <a href="{{ route('main.news') }}">Bekijk al het nieuws hier</a>
</div>
@endsection
