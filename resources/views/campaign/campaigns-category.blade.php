@extends('layout.dashboard')


@section('dashboard-content')
<div class="row">
    <div class="col-12 text-center mb-5">
        @if(!empty($title))
        <h4 class=""> {{ $title }}  </h4>
        @endif
    </div>
    <div class="col-xs-12">
        @if($categories->count())
        <table class="table table-bordered">
            <tr>
                <th class="">@lang('app.category_name') </th>
                <th class="text-center">@lang('app.image') </th>
                <th class="text-center">@lang('app.action') </th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td style="vertical-align: middle"> {{ $category->category_name }}  </td>
                <td style="vertical-align: middle" class="text-center">
                    <div id="s-category-image">
                        <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!--calling showUpload() on label gets invoked two times-->
                            <label for="category_image_edit{{$category->id}}" data-toggle="tooltip" data-placement="top" title="Change Image" class="position-relative">
                                <input id="category_image_edit{{$category->id}}" type="file" accept="image/png,image/jpeg" name="category_image_edit" style="display: none">
                                <img src="{{ $category->category_image }}" class="" alt="" onclick="showUpload(this);">
                                <input type="submit" class="category_image_up_btn" value="Upload" style="position: absolute;bottom: -10px;left: 35px;display: none" onclick="hideUpload(this);">
                            </label>
                        </form>
                    </div>
                </td>
                <td style="vertical-align: middle" class="text-center">
                    <form action="{{ route('category.destroy', $category->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            <script>
                function showUpload(thiss) {
                    $(thiss).siblings('.category_image_up_btn').css('display', 'block');
                }
                function hideUpload(thiss) {
                    $(thiss).css('display', 'none');
                }
            </script>
        </table>
        @else
        <div class="container mt-5">
            <div class="row">
                <div class="col text-muted h3 text-center">
                    <div>No categories has been set</div>
                </div>
            </div>
        </div>
        @endif
        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row mt-5 border border-1 rounded box-shadow py-4 px-2">
                    <div class="col-12 h5 text-center  mb-3">
                        Create New
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group {{ $errors->has('category_name')? 'has-error':'' }}">
                            <label for="category_name" class="control-label">@lang('app.category_name')</label>
                            <input type="text" class="form-control" id="category_name" value="{{ old('category_name') }}" name="category_name" placeholder="@lang('app.category_name')">
                            {!! $errors->has('category_name')? '<p class="help-block">'.$errors->first('category_name').'</p>':'' !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group {{ $errors->has('category_image')? 'has-error':'' }}">
                            <label for="category_image" class="control-label">@lang('app.image')</label>
                            <input type="file" id="category_image" accept="image/png,image/jpeg" name="category_image" class="form-control">
                            {!! $errors->has('category_image')? '<p class="help-block">'.$errors->first('category_image').'</p>':'' !!}
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-sm-center text-md-end">
                            <button type="submit" class="btn btn-primary">@lang('app.save_new_category')</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
