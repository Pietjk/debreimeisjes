<!doctype html>
<html>
    <head>
        <title>Mail vie debreimeisjes.nl</title>
    </head>
    <body>
        {!! App\Services\Text::nl2p($body) !!}
        <hr>
        <p>{{ $footer }}</p>
    </body>
</html>
