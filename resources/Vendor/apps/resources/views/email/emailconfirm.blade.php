@extends('layouts.charity.app')
@section('content')
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="fullscreen bg-lightest">
      <div class="display-table text-center">
        <div class="display-table-cell">
          <div class="container pt-0 pb-0">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2 class="mt-0">Registration Confirmed</h2>
                <p>Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a></p>
                {{-- <a class="btn btn-border btn-gray btn-transparent btn-circled smooth-scroll-to-target" href="{{ route('home') }}">Return Home</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  
  <!-- end main-content -->
@endsection