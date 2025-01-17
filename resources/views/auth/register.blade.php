@extends('layout.form.skel')

@section('content')
<div class="back-to-home rounded d-none d-sm-block">
    <a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
</div>

<!-- Hero Start -->
<section class="bg-half d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="d-none d-lg-block col-lg-7">
                <div class="me-lg-5">   
                    <img src="images/user/signup.svg" class="img-fluid d-block mx-auto" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card shadow rounded border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center">Signup</h4>
                        <form class="login-form mt-4" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input id="name"
                                                   name="name"
                                                   type="text"
                                                   class="form-control ps-5 @error('name') is-invalid @enderror"
                                                   placeholder="Name"
                                                   required
                                                   autocomplete="name"
                                                   autofocus
                                                   value="">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->
                                
                                <!-- 
                                this column could be used
                                <div class="col-md-6">
                                    <div class="mb-3"> 
                                        <label class="form-label">Last name <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user-check" class="fea icon-sm icons"></i>
                                            <input id="lastName"
                                                   name="lastName"
                                                   type="text"
                                                   class="form-control ps-5 @error('name') is-invalid @enderror"
                                                   placeholder="Last Name"
                                                   required
                                                   autocomplete="name"
                                                   autofocus
                                                   value="{{ old('lastName') }}">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                -->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input id="email"
                                                   name="email"
                                                   type="email"
                                                   class="form-control ps-5 @error('email') is-invalid @enderror"
                                                   placeholder="Email"
                                                   required
                                                   autocomplete="email"
                                                   value="">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Phone <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="phone" class="fea icon-sm icons"></i>
                                            <input id="phone"
                                                   name="phone"
                                                   type="text"
                                                   class="form-control ps-5 @error('phone') is-invalid @enderror"
                                                   placeholder="Phone"
                                                   required
                                                   autocomplete="phone"
                                                   value="">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->
                                
                                <!--
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your NID <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input id="nid"
                                                   name="nid"
                                                   type="number"
                                                   class="form-control ps-5 @error('nid') is-invalid @enderror"
                                                   placeholder="National ID"
                                                   required
                                                   autocomplete="nid"
                                                   value=""
                                                   maxlength="255">
                                            @error('nid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col
                                -->
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Password <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input id="password"
                                                   name='password'
                                                   type="password"
                                                   class="form-control ps-5 @error('password') is-invalid @enderror"
                                                   placeholder="Password"
                                                   autocomplete="new-password"
                                                   required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->
                                
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Password <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="key" class="fea icon-sm icons"></i>
                                            <input id="password"
                                                   name="password_confirmation"
                                                   type="password"
                                                   class="form-control ps-5 @error('password') is-invalid @enderror"
                                                   placeholder="Re-enter Password"
                                                   autocomplete="new-password"
                                                   required>
                                            @error('password-confirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="agreed" id="licenseCheckBox" name="licenseCheckBox">
                                            <label class="form-check-label" for="licenseCheckBox">I Accept Terms And Condition</label>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="d-grid">
                                        <button id="licenseCheckBtn" type="submit" class="btn btn-primary" disabled>Request</button>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $("#licenseCheckBox").click(function() {
                                                if ($(this).is(":checked")) {
                                                    $("#licenseCheckBtn").prop('disabled', false);
                                                } else {
                                                      $("#licenseCheckBtn").prop('disabled', true);
                                                }
                                            });
                                        });
                                    </script>
                                </div><!--end col-->

                                <!--
                                <div class="col-lg-12 mt-4 text-center">
                                    <h6>Or Signup With</h6>
                                    <div class="row">
                                        <div class="col-6 mt-3">
                                            <div class="d-grid">
                                                <a href="javascript:void(0)" class="btn btn-light"><i class="mdi mdi-facebook text-primary"></i> Facebook</a>
                                            </div>
                                        </div><!--end col--

                                        <div class="col-6 mt-3">
                                            <div class="d-grid">
                                                <a href="javascript:void(0)" class="btn btn-light"><i class="mdi mdi-google text-danger"></i> Google</a>
                                            </div>
                                        </div><!--end col--
                                    </div>
                                </div><!--end col--
                                -->

                                <div class="mx-auto">
                                    <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="{{ route('login') }}" class="text-dark fw-bold">Sign in</a></p>
                                </div>
                            </div><!--end row-->
                        </form>
                    </div>
                </div>
            </div> <!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<!-- Hero End -->
@endsection
