@extends('layout.form.skel')

@section('content')
<div class="back-to-home rounded d-none d-sm-block">
    <a href="/" class="btn btn-icon btn-soft-primary"><i data-feather="home" class="icons"></i></a>
</div>

<!-- Hero Start -->
<section class="section mt-60">
    <div class="container mt-lg-3">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4 pt-2"> 
                <h5>Change password :</h5>
                <form action="{{ route('preference.updatePassReset') }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="mb-3 {{ $errors->has('old_pass')? 'has-error' : '' }}">
                                <label class="form-label">Old password :</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" name="old_pass" class="form-control ps-5 {{ $errors->has('old_pass')? 'error-border' : '' }}" placeholder="Old password" required="">
                                    {!! $errors->has('old_pass')? '<p class="help-block text-bold text-danger">'.$errors->first('old_pass').'</p>' : '' !!}
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3 {{ $errors->has('password')? 'has-error' : '' }}">
                                <label class="form-label">New password :</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" name="password" class="form-control ps-5 {{ $errors->has('password')? 'error-border' : '' }}" placeholder="New password" required="">
                                    {!! $errors->has('password')? '<p class="help-block text-bold text-danger">'.$errors->first('password').'</p>' : '' !!}
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3 {{ $errors->has('password_confirmation')? 'has-error' : '' }}">
                                <label class="form-label">Re-type New password :</label>
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" name="password_confirmation" class="form-control ps-5 {{ $errors->has('password_confirmation')? 'error-border' : '' }}" placeholder="Re-type New password" required="">
                                    {!! $errors->has('password_confirmation')? '<p class="help-block text-bold text-danger">'.$errors->first('password_confirmation').'</p>' : '' !!}
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12 mt-2 mb-0">
                            <button type="submit" class="btn btn-primary">Save password</button>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div><!--end col-->
        </div>
    </div>
</section>
<!-- Hero End -->
@endsection
