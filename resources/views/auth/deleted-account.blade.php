@extends('layout.form.skel')

@section('content')
<!-- Hero Start -->
<section class="bg-half d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="me-lg-5">   
                    You have deleted your account. You can never retrieve the account any more. But You are free to create
                    new account with a email or phone different than before.
                    
                    {{--
                    <!--
                    <form class="d-inline" action="{{ route('user.updateRetrieval')}}" method="POST">
                        @csrf
                        @method('patch')
                        <button type="submit" class="dropdown-item">Retrieve</button>
                    </form>
                    -->
                    --}}
                    
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
