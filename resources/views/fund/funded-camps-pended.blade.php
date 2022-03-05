@extends('layout.dashboard')


@section('dashboard-content')
<div id="funded-camps-pended">
    @include('partial.funded-camps-completely-table', ['completely' => $pended])
</div>
@endsection
