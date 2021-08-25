@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary">ontwerpen</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tellus et nisi tincidunt, feugiat ullamcorper arcu sodales. Etiam facilisis, leo sit amet vulputate accumsan, eros mi luctus est, ac pretium eros orci fringilla est. Morbi a dui in mi condimentum commodo. Nunc ut dapibus ex, nec suscipit nisi. Mauris consequat sem ultricies mauris accumsan auctor. Quisque commodo elit leo, at pretium lacus interdum ut. Nullam placerat tincidunt tortor sed elementum. Curabitur ac lacus libero. Nullam non arcu vel arcu varius rhoncus id at risus. Aliquam nec dignissim est. Mauris posuere felis eu est imperdiet tempor. Suspendisse lacus velit, feugiat ut auctor et, suscipit ac mi. Sed pretium faucibus arcu, a congue lectus tempus eget. Aenean diam neque, molestie eget odio ac, accumsan laoreet eros. Sed pharetra quis sapien sit amet elementum. Curabitur et dui at arcu dignissim tempus ac vitae ipsum.</p>
        <hr class="text-primary">
        {{-- @dd($products) --}}
        @foreach ($products as $product)
        <div onclick="location.href='https://www.ravelry.com/patterns/library/{{ Str::slug($product['title'], '-') }}';" class="card bg-primary mb-3" title="https://www.ravelry.com/patterns/library/{{ Str::slug($product['title'], '-') }}">
            <div class="row products">
                <div class="col-3 col-sm-2 col-lg-1 align-self-center"><img src="{{ $product['square_thumbnail_url'] }}" alt=""></div>
                <div class="col-6 col-sm-8 col-lg-10 text-white align-self-center"><p>{{ $product['title'] }}</p></div>
                <div class="col-3 col-sm-2 col-lg-1 text-white align-self-center text-center">
                    @if ($product['price'] === null)
                        <p>Gratis</p>
                    @else
                        <p>€ {{ round($product['price'] * 1.09, 2) }}</p>
                    @endif
                </div>
            </div>

        </div>
        @endforeach
    </div>
@endsection
