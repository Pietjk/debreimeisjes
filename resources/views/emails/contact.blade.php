<!doctype html>
<html>
    <head>
        <title>Mail vie debreimeisjes.nl</title>
    </head>
    <body>
        {!! App\Services\Text::nl2p(e($body)) !!}
        <hr>
        <p>{{ $footer }}</p>
    </body>
</html>
