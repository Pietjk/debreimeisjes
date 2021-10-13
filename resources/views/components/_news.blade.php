<div class="col-md-6 d-flex">
    <div class="card text-white bg-primary mb-4">
        <div class="card-header">
            <h3>{{ $news->title }}</h3>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="clearfix">
                    <div class="text-center">
                        <img src="{{ asset('storage/'.$news->image_path) }}" class="col-md-6 float-md-start mb-3 me-md-3 mw-100 rounded" alt="...">

                    </div>
                    <p>
                        {!! App\Services\Text::nl2p($news->text) !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <p class="fs-4">
                <a href="{{ $news->blog_link }}" class="text-white">Blog</a>
                @if ($news->news_link !== null)
                    <span> | </span>
                    <a href="{{ $news->news_link }}" class="text-white">nieuws site</a>
                @endif
            </p>
        </div>
    </div>
</div>
