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
            @if($inv->is_verified === 'yes')
                <p>Your investigation report for this campaign <a href="{{ route('campaign.showGuestCampaign', $inv->campaign->id) }}">'{{$inv->campaign->title}}'</a> is approved</p>
            @elseif($inv->is_verified === 'no')
                <p>Your investigation report for this campaign <a href="{{ route('campaign.showGuestCampaign', $inv->campaign->id) }}">'{{$inv->campaign->title}}'</a> is canceled</p>
            @endif
        </div>
    </section>
</main>
</body>
</html>
