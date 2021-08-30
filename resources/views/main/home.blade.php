@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-primary">Welkom op debreimeisjes.nl!</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tellus et nisi tincidunt, feugiat ullamcorper arcu sodales. Etiam facilisis, leo sit amet vulputate accumsan, eros mi luctus est, ac pretium eros orci fringilla est. Morbi a dui in mi condimentum commodo. Nunc ut dapibus ex, nec suscipit nisi. Mauris consequat sem ultricies mauris accumsan auctor. Quisque commodo elit leo, at pretium lacus interdum ut. Nullam placerat tincidunt tortor sed elementum. Curabitur ac lacus libero. Nullam non arcu vel arcu varius rhoncus id at risus. Aliquam nec dignissim est. Mauris posuere felis eu est imperdiet tempor. Suspendisse lacus velit, feugiat ut auctor et, suscipit ac mi. Sed pretium faucibus arcu, a congue lectus tempus eget. Aenean diam neque, molestie eget odio ac, accumsan laoreet eros. Sed pharetra quis sapien sit amet elementum. Curabitur et dui at arcu dignissim tempus ac vitae ipsum.</p>
    <h5 class="text-primary">Hier is mijn blog:</h5>
    <a href="https://debreimeisjes.blogspot.nl">debreimeisjes.blogspot.nl</a>
    <hr class="text-primary">

    <h3 class="text-primary">Mijn spannendste patronen!</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tellus et nisi tincidunt, feugiat ullamcorper arcu sodales. Etiam facilisis, leo sit amet vulputate accumsan, eros mi luctus est, ac pretium eros orci fringilla est.</p>
    @each('components._products', $products, 'product')
    <a href="{{ route('designs') }}">Bekijk al mijn patronen hier</a>
    <hr class="text-primary">

    <h3 class="text-primary">Het laatste nieuws</h3>
    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tellus et nisi tincidunt, feugiat ullamcorper arcu sodales. Etiam facilisis, leo sit amet vulputate accumsan, eros mi luctus est, ac pretium eros orci fringilla est. Morbi a dui in mi condimentum commodo. Nunc ut dapibus ex, nec suscipit nisi. Mauris consequat sem ultricies mauris accumsan auctor. Quisque commodo elit leo, at pretium lacus interdum ut. Nullam placerat tincidunt tortor sed elementum. </p> --}}
    <div class="row">
        <div class="col-xs-12">
            <div class="card bg-primary text-white news">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{ asset('/images/placeholder.jpg') }}" alt="..." class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-10">
                        <div class="card-header"><h4>Uitgelicht patroon</h4></div>
                        <div class="card-body">
                            <p class="card-text">De allereerste naamslinger die ik gehaakt heb, is deze, voor de eerste verjaardag van Mick, naar een idee van zijn moeder. In de loop der jaren heb ik heel wat slingers voor haar mogen haken: voor haar eigen kinderen en ook voor kinderen van familie of vrienden.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
