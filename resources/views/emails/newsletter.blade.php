<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $newsletter->subject ?? 'Newsletter' }}</title>
</head>
<body>
    <h1>{{ $newsletter->title }}</h1>
    <div>
        {!! $newsletter->content !!}
    </div>

    <p>
        <a href="{{ $unsubscribeUrl }}">Se désabonner</a>
    </p>

    {{-- pixel invisible pour le tracking --}}
    <img src="{{ $trackingPixelUrl }}" alt="" width="1" height="1">
</body>
</html>
