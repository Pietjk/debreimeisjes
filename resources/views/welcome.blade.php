@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @for ($i=0; $i<15; $i++)
        <div style="height: 100px; width: 100%; margin-bottom: 20px; background-color: purple;"></div>
    @endfor
</div>
@endsection
