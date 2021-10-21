@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components._messages')
        <h3 class="text-primary">Pas het nieuws bericht aan</h3>
        <hr>
        <form action="{{ route('news.update', $news) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col md-8">
                    <div class="mb-3">
                        <label class="form-label">Titel</label>
                        <input name="title" type="text" class="form-control" placeholder="Titel" value="{{ old('title') ?? $news->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tekst</label>
                        <textarea name="text" class="form-control" rows="10" placeholder="Verhaal">{{ old('text') ?? $news->text }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link naar de blog</label>
                        <input name="blog_link" type="text" class="form-control" placeholder="Link naar de blog" value="{{ old('blog_link') ?? $news->blog_link }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Link naar de nieuws site (niet verplicht)</label>
                        <input name="news_link" type="text" class="form-control" placeholder="Link naar het nieuws" value="{{ old('news_link') ?? $news->news_link }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Afbeelding</label>
                        <input name="image" type="file" class="form-control file" placeholder="Titel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label w-100">Huidige afbeelding</label>
                        <img src="{{ asset($news->image_path) }}" alt="" class="rounded mw-100" width="300px">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Pas aan</button>
        </form>
    </div>
@endsection
