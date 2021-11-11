@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary">{{ $post->title }}@auth <a href="{{ route('post.edit', $post) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
        {!! App\Services\Text::nl2p($post->description) !!}
        <hr class="text-primary">
        @include('components._messages')
        <form action="{{ route('send') }}" method="post">
            @csrf
            @honeypot
            <div class="mb-3">
                <label class="form-label">Naam</label>
                <input type="text" name="name" class="form-control" placeholder="Uw naam" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail addres</label>
                <input type="email" name="email" class="form-control" placeholder="Uw e-mail adres" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Onderwerp</label>
                <input type="text" name="subject" class="form-control" placeholder="Het onderwerp" value="{{ old('subject') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Uw bericht</label>
                <textarea class="form-control" name="message" rows="4" placeholder="Uw bericht">{{ old('message') }}</textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Verstuur uw bericht</button>
            </div>
        </form>
    </div>
@endsection
