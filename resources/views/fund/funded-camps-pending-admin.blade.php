@extends('layout.dashboard')


@section('dashboard-content')
<div id="funded-camps-pending-admin">
    @include('partial.funded-camps-pending-admin-table')
</div>
@endsection
