@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-primary">ontwerpen</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam placerat tellus et nisi tincidunt, feugiat ullamcorper arcu sodales. Etiam facilisis, leo sit amet vulputate accumsan, eros mi luctus est, ac pretium eros orci fringilla est. Morbi a dui in mi condimentum commodo. Nunc ut dapibus ex, nec suscipit nisi. Mauris consequat sem ultricies mauris accumsan auctor. Quisque commodo elit leo, at pretium lacus interdum ut. Nullam placerat tincidunt tortor sed elementum. Curabitur ac lacus libero. Nullam non arcu vel arcu varius rhoncus id at risus. Aliquam nec dignissim est. Mauris posuere felis eu est imperdiet tempor. Suspendisse lacus velit, feugiat ut auctor et, suscipit ac mi. Sed pretium faucibus arcu, a congue lectus tempus eget. Aenean diam neque, molestie eget odio ac, accumsan laoreet eros. Sed pharetra quis sapien sit amet elementum. Curabitur et dui at arcu dignissim tempus ac vitae ipsum.</p>
        <hr class="text-primary">
        @each('components._products', $products, 'product')
    </div>
@endsection
