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
            {{$payment->donation->donor->name}} has donated to <a href="{{ route('campaign.showGuestCampaign', $payment->donation->campaign->id) }}">'{{$payment->donation->campaign->title}}'</a>, which you are campaigning on, {{ $payment->donation->totalPayableAmount() }} taka just now.
        </div>
    </section>
</main>
</body>
</html>
