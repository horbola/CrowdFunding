@extends('layout.dashboard')


@section('dashboard-content')
<div id="funded-camps-partly">
    @include('partial.funded-camps-not-table', ['not' => $partly, 'partly' => 'true'])
</div>
@endsection
