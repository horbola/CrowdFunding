@extends('layout.dashboard')


@section('dashboard-content')
<div id="funded-camps-fundable">
    @include('partial.funded-camps-not-table', ['not' => $fundable])
</div>
@endsection
