@extends('layouts.form.skel')

@section('page-script')
<!-- DataTables JavaScript -->
<link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/jquery.dataTables.js') }}" defer></script>
<link href="{{ asset('css/dataTables.jqueryui.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/dataTables.jqueryui.js') }}" defer></script>
@endsection

@section('content')
<!-- Hero Start -->
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="mt-5">
                    <div class="text-center mb-5">{{ $type }}</div>
                    @include('partial.admin.component.users-table')
                </div>
            </div>
        </div>
    </div>
</section>
<!--Hero ends-->


@section('page-script-init')
<script>
$(document).ready(function () {
    $(document).ready(function() {
        $('#users-table').DataTable();
    });
});
</script>
@endsection