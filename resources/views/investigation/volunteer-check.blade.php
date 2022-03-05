@extends('layout.dashboard')


@section('dashboard-content')
<div id="volunteer-check">
    You are not applied or allowed  as volunteer. To investigate on any campaign you have to be a volunteer first. You can apply for it <a href="{{ route('volunteer.create') }}">here</a>
</div>
@endsection
