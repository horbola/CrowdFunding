@extends('layouts.charity.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <section class="auth-form">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create a new account</div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Full Name (EN)</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Mobile Number</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="number" class="form-control" name="phone" required>
                                       @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <!--Mobile Number Must be 11 Length-->
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif  
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('nid') ? ' has-error' : '' }}">
                                    <label for="nid" class="col-md-4 control-label">NID/Birth ID</label>

                                    <div class="col-md-6">
                                        <input id="nid" type="number" class="form-control" name="nid" required>
                                        @if ($errors->has('nid'))
                                        <span class="help-block">
                                            <!--NID/Birth ID Number Must be 10 Length-->
                                            <strong>{{ $errors->first('nid') }} </strong>
                                        </span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="nid" class="col-md-4 control-label">Date Of Birth</label>
                                    <div class="col-md-6">
                                        <input class="form-control" id="date" name="dob" placeholder="DD/MM/YYY" type="text" required/>
                                        @if ($errors->has('dob'))
                                        <span class="help-block">
                                            <strong>Date of Birth Must be Required</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <p style="font-size: 10px; text-align: justify;">
                                        By clicking Create Account, you agree to our <a href="/terms-of-use" target="_blank">Terms</a> and confirm that you have read our <a href="/privacy-policy" target="_blank">Policy</a>. You may receive SMS message notifications from Oporajoy and can opt out at any time.</p>
                                        <button type="submit" class="btn btn-primary">
                                            Create Account
                                        </button>
                                        </div>
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
@section('page-js')

<script type="text/javascript">
    $(document).ready(function(){
      var date_input=$('input[name="dob"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
@endsection