@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">{{ $text->title }}@auth <a href="{{ route('post.edit', $text) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
    {!! $description !!}
    <hr class="text-primary">
    <div class="row">
        @include('components._news')
    </div>
</div>
@endsection
