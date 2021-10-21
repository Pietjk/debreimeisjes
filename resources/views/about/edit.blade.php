@extends('layouts.app')

@section('content')
    <div class="container">
        @include('components._messages')
        <h3 class="text-primary">Pas "over ons" aan</h3>
        <hr>
        <form action="{{ route('about.update', $about) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col md-8">
                    <div class="mb-3">
                        <label class="form-label">Titel</label>
                        <input name="title" type="text" class="form-control" placeholder="Titel" value="{{ old('title') ?? $about->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tekst</label>
                        <textarea name="text" class="form-control" rows="10" placeholder="Verhaal">{{ old('text') ?? $about->text }}</textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label">Afbeelding</label>
                        <input name="image" type="file" class="form-control file" placeholder="Titel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label w-100">Huidige afbeelding</label>
                        <img src="{{ asset($about->image_path) }}" alt="" class="rounded mw-100" width="300px">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Pas aan</button>
        </form>
    </div>
@endsection
