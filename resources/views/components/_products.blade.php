@auth
<div class="card px-2 pt-2 mb-3">
    <div class="form-check form-switch pb-2">
        <form action="{{ route('product.feature') }}" method="post">
            @csrf
            <input type="hidden" name="product" value="{{ $product['id'] }}">
            <input class="form-check-input" type="checkbox" onchange="this.form.submit();" @if ($favorites->contains($product['id'])) checked @endif>
            <label class="form-check-label">@if ($favorites->contains($product['id'])) aanbevolen @else aanbevelen @endif</label>
        </form>
    </div>
@endauth

<a href="https://www.ravelry.com/patterns/library/{{ $product['permalink'] }}" class="card bg-primary text-decoration-none zoom mb-3">
    <div class="row products">
        <div class="col-3 col-sm-2 col-lg-1 align-self-center"><img src="{{ $product['photos'][0]['square_url'] }}" alt=""></div>
        <div class="col-6 col-sm-8 col-lg-10 text-white align-self-center">
            <p class="mb-0">{{ $product['name'] }}</p>
            <p class="mb-0"><i class="fas fa-heart"></i> x {{ $product['favorites_count'] }}</p>
        </div>
        
        <div class="col-3 col-sm-2 col-lg-1 text-white align-self-center text-center price">
            @if ($product['free'])
                <p>Gratis</p>
            @else
                <p>€ {{ number_format($product['price'] * 1.09, 2, ',', '.') }}</p>
            @endif
        </div>
    </div>
</a>
@auth
</div>
@endauth
