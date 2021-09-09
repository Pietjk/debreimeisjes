@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary">{{ $text->title }}@auth <a href="#"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
        {!! $description !!}
        <hr class="text-primary">
        @each('components._products', $products, 'product')
    </div>
@endsection
