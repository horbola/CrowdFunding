@extends('layout.face.skel')


@section('content')
@include('partial.home.banner')
@include('partial.home.category')
@include('partial.home.social-media')
@include('partial.home.preready')
@include('partial.home.choosing-oporajoy')
@include('partial.home.app')

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-light">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->
@endsection


