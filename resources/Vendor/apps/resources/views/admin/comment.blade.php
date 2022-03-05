@extends('layouts.admin.app')
@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection
@section('content')
<div id="page-wrapper">
    @if( ! empty($title))
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> {{ $title }}  </h1>
        </div> <!-- /.col-lg-12 -->
    </div> <!-- /.row -->
    @endif
    <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Comments Table
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="commentTable">
                                        <thead>
                                            <tr>
                                                <th>SL No</th>
                                                <th class="col-md-2">User Name</th>
                                                <th class="col-md-3">Comment</th>
                                                <th class="col-md-3">Comment Campaign</th>
                                                <th class="col-md-1">Submited</th>
                                                <th class="col-md-1">Status</th>
                                                <th class="col-md-2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $sl = 1; @endphp
                                            @foreach($comments as $comment)
                                            <tr class="odd gradeX">
                                                <td>{{$sl}} @php $sl++ @endphp</td>
                                                <td>{{$comment->user->name}}</td>
                                                <td>{{$comment->comment}}</td>
                                                <td><a target="_blank" href="{{route('campaign_single', [$comment->campaign_id, $comment->campaign_id])}}">{{$comment->campaign_id}}</a></td>
                                                <td>{{$comment->created_at}}</td>
                                                <td id="status{{$comment->id}}">{{($comment->approved === 1)?'Active':'Inactive'}}</td>
                                                <td><a href="javascript:void(0)" class="btn btn-success btn-sm" onclick="CommentActive('{{$comment->id}}')" title="Active"><i class="fa fa-check"></i></a> <a href="javascript:void(0)" onclick="CommentDelete('{{$comment->id}}')" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-ban"></i></a></td>
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
        $('#commentTable').DataTable({
            responsive: true
        });
    });
    function CommentActive(id){
        $.ajax({
            type: "POST",
            url: '{{route('comment')}}',
            data: {'id': id, "_token": "{{ csrf_token() }}", 'status':'1', 'message':'Active'},
            success: function(msg) {
                var data = $.parseJSON(msg);
                toastr.info(data.message);
                $('#status'+id).text('Active');
            }
        });

    }
    function CommentDelete(id){
        $.ajax({
            type: "POST",
            url: '{{route('comment')}}',
            data: {'id': id, "_token": "{{ csrf_token() }}", 'status':'0', 'message':'Inactive'},
            success: function(msg) {
                var data = $.parseJSON(msg);
                toastr.warning(data.message);
                $('#status'+id).text('Inactive');
            }
        });
    }
</script>
@endsection