@extends('layouts.admin.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('content')
    <div id="page-wrapper">
        <div class="col-md-12">
                    @if( ! empty($title))
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"> {{ $title }}
                                    <a href="{{ route('create_new_page') }}" class="btn btn-info pull-right"> <i class="fa fa-floppy-o"></i> @lang('app.create_new_page')</a>
                                </h1>
                            </div> <!-- /.col-lg-12 -->
                        </div> <!-- /.row -->
                    @endif

                    @include('admin.flash_msg')

                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered table-striped" id="jDataTable">
                                <tr>
                                    <th>@lang('app.title')</th>
                                    <th>@lang('app.created_at')</th>
                                    <th>@lang('app.actions')</th>
                                </tr>

                                @foreach($pages as $page)

                                    <tr>
                                        <td>{{$page->title}}</td>
                                        <td>{{$page->created_at_datetime()}}</td>
                                        <td>

                                            <a href="{{route('edit_page',$page->slug)}}" class="btn btn-primary"><i class="fa fa-edit"></i> </a><a href="javascript:;" class="btn btn-danger deletePage" data-slug="{{$page->slug}}"><i class="fa fa-trash"></i> </a>'

                                        </td>
                                    </tr>

                                @endforeach

                            </table>


                            {!! $pages->links() !!}
                        </div>
                    </div>
        </div>   <!-- /#page-wrapper -->
    </div>   <!-- /#wrapper -->
@endsection

@section('page-js')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.btn-danger', function (e) {
                if (!confirm("<?php echo trans('app.are_you_sure') ?>")) {
                    e.preventDefault();
                    return false;
                }

                var selector = $(this);
                var slug = $(this).data('slug');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('delete_page') }}',
                    data: {slug: slug, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                            selector.closest('tr').hide('slow');
                            var options = {closeButton: true};
                            toastr.success(data.msg, '<?php echo trans('app.success') ?>', options)
                        }
                    }
                });
            });
        });
    </script>

    <script>
        var options = {closeButton : true};
        @if(session('success'))
            toastr.success('{{ session('success') }}', '<?php echo trans('app.success') ?>', options);
        @endif
    </script>
@endsection


