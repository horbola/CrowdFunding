@extends('layout.dashboard')


@section('dashboard-content')
<div id="funded-camps-not-admin">
    @include('partial.funded-camps-not-admin-table')
</div>
@endsection
