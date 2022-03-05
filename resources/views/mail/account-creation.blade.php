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
            <p>
                As you didn't donate before with this information. So, we've created an account for you with the information you've provided.
                <br />
                <br />
                The creadential for that account is: <br />
                User Id: {{ $user->email }}<br />
                Password: {{ $randPass }} <br />
                If you want to change this auto generated password, then please go to: <br /> 'Dashboard->Preferences->Change Password'
            </p>
        </div>
    </section>
</main>
</body>
</html>
