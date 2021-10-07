@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components._messages')
        <h3 class="text-primary">Voeg een nieuw(s) bericht toe</h3>
        <hr>
        <form action="{{ route('news.store') }}" method="post">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                <label class="form-label">Titel</label>
                <input name="title" type="text" class="form-control" placeholder="Titel" value="">
            </div>
            <div class="mb-3">
                <label class="form-label">Tekst</label>
                <textarea name="text" class="form-control" rows="5" placeholder="Verhaal"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Link naar de blog</label>
                <input name="blog_link" type="text" class="form-control" placeholder="Titel" value="">
            </div>
            <div class="mb-3">
                <label class="form-label">Link naar de nieuws site (niet verplicht)</label>
                <input name="news_link" type="text" class="form-control" placeholder="Titel" value="">
            </div>
            <div class="mb-3">
                <label class="form-label">Link naar de blog</label>
                <input name="image_path" type="file" class="form-control file" placeholder="Titel" value="">
            </div>
            <button type="submit" class="btn btn-primary">Maak aan</button>
        </form>
    </div>
@endsection
