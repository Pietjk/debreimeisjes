@php
    // Get title
    $title = $product['title'];
    // Replace random part of url with nothing
    $url = Str::slug($title);

    // If string contains a "-" add back 2 "--" !!! ONLY WORKS WITH 1 "-" !!!
    if (strpos($title, '-') ==! false) {
        $pos = strpos($title, '-');
        $url = substr_replace($url, '--', $pos - 1, 0);
    }
@endphp

<div onclick="location.href='https://www.ravelry.com/patterns/library/{{ $url }}';" class="card bg-primary mb-3" title="https://www.ravelry.com/patterns/library/{{ $url }}">
    <div class="row products">
        <div class="col-3 col-sm-2 col-lg-1 align-self-center"><img src="{{ $product['square_thumbnail_url'] }}" alt=""></div>
        <div class="col-6 col-sm-8 col-lg-10 text-white align-self-center"><p>{{ $product['title'] }}</p></div>
        <div class="col-3 col-sm-2 col-lg-1 text-white align-self-center text-center price">
            @if ($product['price'] === null)
                <p>Gratis</p>
            @else
                <p>€ {{ number_format($product['price'] * 1.09, 2, ',', '.') }}</p>
            @endif
        </div>
    </div>
</div>
