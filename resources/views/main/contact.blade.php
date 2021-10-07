@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary">{{ $text->title }}@auth <a href="{{ route('post.edit', $text) }}"><i class="fas fa-pen-square ps-2"></i></a>@endauth</h3>
        {!! $description !!}
        <hr class="text-primary">
        <form action="">
            <div class="mb-3">
                <label class="form-label">Naam</label>
                <input type="text" class="form-control" placeholder="Uw naam">
            </div>
            <div class="mb-3">
                <label class="form-label">E-mail addres</label>
                <input type="email" class="form-control" placeholder="Uw e-mail adres">
            </div>
            <div class="mb-3">
                <label class="form-label">Onderwerp</label>
                <input type="text" class="form-control" placeholder="Het onderwerp">
            </div>
            <div class="mb-3">
                <label class="form-label">Uw bericht</label>
                <textarea class="form-control" rows="3" placeholder="Uw bericht"></textarea>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Verstuur uw bericht</button>
            </div>
        </form>
    </div>
@endsection
