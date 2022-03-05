@extends('layout.dashboard')


@section('dashboard-content')
<div id="funded-camps-blocked">
    @include('partial.funded-camps-blocked-table')
</div>
@endsection
