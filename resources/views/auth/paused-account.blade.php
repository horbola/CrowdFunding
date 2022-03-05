@extends('layout.form.skel')

@section('content')
<!-- Hero Start -->
<section class="bg-half d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="me-lg-5">   
                    You have paused your account. If you want to resume it, please press the button below.
                    <form class="d-inline" action="{{ route('user.updateResuming')}}" method="POST">
                        @csrf
                        @method('patch')
                        <button type="submit" class="dropdown-item">Resume</button>
                    </form>
                    or
                    <form class="d-inline" action="{{ route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Go to home</button>
                    </form>
                </div>
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->
@endsection
