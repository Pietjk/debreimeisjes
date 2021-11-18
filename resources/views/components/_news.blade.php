<div class="col-md-6 d-flex">
    <div class="card text-white bg-primary mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h3>{{ $news->title }}</h3>
                </div>
                @auth
                    <div class="col-2 text-end fs-5 ">
                        <a href="{{ route('news.edit', $news) }}"><i class="far fa-edit text-white"></i></a>
                        |
                        <a href="#" onclick="document.getElementById('destroyerOfNews{{ $news->id }}').submit()"><i class="fas fa-trash text-white"></i></a>
                        <form action="{{ route('news.destroy', $news) }}" method="post" style="display: none;" id="destroyerOfNews{{ $news->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                @endauth
            </div>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="clearfix">
                    <div class="text-center">
                        <img src="{{ asset($news->image_path) }}" class="col-md-6 float-md-start mb-3 me-md-3 mw-100 rounded" alt="...">
                    </div>
                    {!! App\Services\Text::nl2p(e($news->text)) !!}
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <p class="fs-5 mb-0">
                <a href="{{ $news->blog_link }}" class="text-white">Blog</a>
                @if ($news->news_link !== null)
                    <span> | </span>
                    <a href="{{ $news->news_link }}" class="text-white">nieuws site</a>
                    @endif
                </p>
                <p class="text-white mb-1">Geupload op: {{ date('d-m-Y', strtotime($news->created_at)) }}</p>
        </div>
    </div>
</div>
