@extends('layouts.app')

@section('content')
    <div class="container">
        <p>ontwerpen</p>
        {{-- @dd($products) --}}
        @foreach ($products as $product)
            <p>{{ $product['title'] }}</p>
            <p>{{ ($product['price'] * 1.09) }}</p>
            <p>{{ $product['product_type'] }}</p>
            <img src="{{ $product['square_thumbnail_url'] }}" alt="">
        @endforeach
    </div>
@endsection
