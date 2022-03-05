@extends('layouts.admin.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection
@section('content')
<div id="page-wrapper">
	@if( ! empty($title))
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <h1 class="page-header"> {{ $title }}  </h1>
        </div> <!-- /.col-lg-12 -->
    </div> <!-- /.row -->
    @endif
	<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Users Table
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                              <form action="{{route('user_show', $id)}}" method="POST" role="form">
                                <input type="hidden" name='_token' value ="{{csrf_token()}}">
                                  <legend>Edit User</legend>
                              
                                  <div class="form-group">
                                      <label for="">Full Name</label>
                                      <input type="text" class="form-control" id="" name="name" value="{{$user->name}}" placeholder="User Name">
                                  </div>

                                  <div class="form-group">
                                      <label for="">Email</label>
                                      <input type="text" class="form-control" id="" name="email" value="{{$user->email}}" placeholder="User Email">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Mobile</label>
                                      <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" placeholder="User Mobile">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Address</label>
                                      <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}" placeholder="User Address">
                                  </div>
                                  <select name="active_status" id="active_status" class="form-control" required="required">
                                      <option value="1" {{($user->active_status == 1)?'selected':''}}>Active</option>
                                      <option value="0" {{ ($user->active_status == 0)?'selected':''}}>Inactive</option>
                                  </select>

                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
@endsection
@section('page-js')
@endsection