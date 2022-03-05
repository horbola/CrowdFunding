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
            @if($campaign->status === 1)
            <p>The Campaign <a href="{{ route('campaign.showGuestCampaign', $campaign->id) }}">'{{ $campaign->title }}'</a> you have created is approved and now ready to take donation</p>
            @elseif($campaign->status === 2)
                <p>The Campaign '{{ $campaign->title }}' you have created is canceled</p>
            @elseif($user->is_volunteer === 3)
                <p>The Campaign '{{ $campaign->title }}'  is blocked</p>
            @endif
        </div>
    </section>
</main>
</body>
</html>
