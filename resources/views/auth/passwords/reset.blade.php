@extends('layouts.form.skel')

@section('content')
<div class="back-to-home rounded d-none d-sm-block">
    <a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
</div>

<section class="bg-half d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div>
                    <img src="../../images/user/signup.svg" class="img-fluid d-block mx-auto" alt="this area is for an image">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class='title text-center'>Reset Password</h4>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email address</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input id="email"
                                           name="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror ps-5"
                                           value="{{ $email ?? old('email') }}"
                                           required
                                           autocomplete="email"
                                           autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-label">{{ __('Password') }} <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input id="password"
                                           name="password"
                                           type="password"
                                           class="form-control @error('password') is-invalid @enderror ps-5"
                                           required
                                           autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <!--<span class="fw-bold h4"></span>-->
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input id="password-confirm"
                                           type="password"
                                           class="form-control ps-5"
                                           name="password_confirmation"
                                           required
                                           autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
