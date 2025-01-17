@extends('layout.form.skel')

@section('content')
<div class="back-to-home rounded d-none d-sm-block">
    <a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
</div>

<!-- Hero Start -->
<section class="bg-half d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="me-lg-5">   
                    <img src="../images/user/recovery.svg" class="img-fluid d-block mx-auto" alt="this area is for an image">
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="card shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">Recover Account</h4>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form class="login-form mt-4" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="text-muted">Please enter your email address. You will receive a link to create a new password via email.</p>
                                    <div class="mb-3">
                                        <label class="form-label">Email address <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input id="email"
                                                   name="email"
                                                   type="email"
                                                   class="form-control ps-5 @error('email') is-invalid @enderror"
                                                   required
                                                   value="{{ old('email') }}"
                                                   placeholder="Enter Your Email Address"
                                                   autocomplete="email"
                                                   autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-lg-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Send</button>
                                    </div>
                                </div><!--end col-->
                                <div class="mx-auto">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">Remember your password ?</small> <a href="{{ route('login') }}" class="text-dark fw-bold">Sign in</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->
@endsection
