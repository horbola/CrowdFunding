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
    @include('admin.flash_msg')
	<div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Users Table
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="usersTable">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th>User Name</th>
                                                <th>Date of Birth</th>
                                                <th>NID</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@php $sl = 1; @endphp
                                        	@foreach($users as $user)
                                            <tr class="odd gradeX">
                                                <td>{{$sl}} @php $sl++ @endphp</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->dob}}</td>
                                                <td>{{$user->nid}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->address}}</td>
                                                <td>{{($user->active_status == 1)?'Active':'Inactive'}}</td>
                                                <td><a class="btn btn-success  btn-sm" href="{{route('user_show', $user->id)}}"><i class="fa fa-pencil"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
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
<!-- DataTables JavaScript -->
<script src="{{ asset('admin/js/dataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            responsive: true
        });
    });
</script>
@endsection