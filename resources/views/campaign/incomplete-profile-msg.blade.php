@extends('layout.dashboard')


@section('dashboard-content')
<div id="incomplete-profile-msg">
    {{ $message }}
    <a href="{{ route('user.edit', ['origUrl' => route('campaign.create')]) }}">Complete Profile</a>
</div>
@endsection

