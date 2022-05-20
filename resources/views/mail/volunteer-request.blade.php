<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title?? '' }}</title>
    <link href="{{ asset('images/logo-b.png') }}" rel="shortcut icon">
    <style>
        .section {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .section p {
            font-weight: bold;
        }
    </style>
    <script></script>
</head>
<body>
<main>
    <section>
        <div>
            @if( (int)$user->is_volunteer === 0 )
                <p>Your volunteer request is canceled</p>
            @elseif( (int)$user->is_volunteer === 2 )
                <p>Your volunteer request is approved</p>
            @elseif( (int)$user->is_volunteer === 3 )
                <p>Your volunteer request is revoked</p>
            @endif
        </div>
    </section>
</main>
</body>
</html>
