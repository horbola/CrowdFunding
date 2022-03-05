@extends('layout.face.skel')

@section('content')
@if(session()->has('message'))
<p class="alert alert-info">
    {{ session()->get('message') }}
</p>
@endif
<div>
    You are logged out. Please log in again. Reload the page.
</div>
@endsection
