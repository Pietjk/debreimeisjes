@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3 class="text-primary">{{ $about->title }} @auth <a href="{{ route('about.edit', $about) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth </h3>
            <div class="clearfix">
                <img src="{{ asset($about->image_path) }}" class="col-md-3 float-md-end mb-3 ms-md-3 mw-100 rounded" alt="...">
                {!! App\Services\Text::nl2p($about->text) !!}
            </div>
        </div>
    </div>
        @endsection
