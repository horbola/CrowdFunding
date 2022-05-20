@extends('layout.dashboard')


@section('dashboard-content')
<div id="comments">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-7 text-center text-md-start">
            <div class="section-title">
                @if($comments->count() && $comments instanceof Illuminate\Contracts\Pagination\Paginator)
                <h5 class="mb-0 mt-4 mt-md-0">Showing {{$comments->firstItem()}}–{{$comments->lastItem()}} of {{$comments->total()}} results</h5>
                @endif
            </div>
        </div><!--end col-->

        <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
            <div class="form custom-form">
                <div class="mb-0">
                    <!-- SEARCH -->
                    <div class="widget">
                        <form action="{{-- Illuminate\Support\Facades\Route::current() --}}" method="get">
                            <div class="input-group mb-3 border rounded border-primary">
                                <input type="hidden" name="searching" value="1">
                                <input type="text" id="search-campaign" name="q" class="form-control border-0" value="{{request()->q}}" placeholder="Search Keywords...">
                                <button type="submit" class="input-group-text bg-white border-0" id="searchsubmit"><i class="uil uil-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    
    <div class="row mt-5">
        <div class="col">
            <div id="users-table" class="table-responsive bg-white shadow rounded">
                <table class="display table mb-0 table-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Commentor</th>
                            <th>Comment</th>
                            <th>Campaign</th>
                            <th>Made</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $serial = $comments->firstItem() - 1 @endphp
                        @foreach($comments as $comment)
                        <tr>
                            @php $serial++ @endphp
                            <td>{{$serial}}</td>
                            <td><a href="{{ route('user.show', $comment->commentor->id) }}">{{$comment->commentor->name}}</a></td>
                            <td>{{ $comment->body }}</td>
                            <td><a href="{{ route('campaign.showGuestCampaign', $comment->campaign->slug) }}">{{$comment->campaign->title}}</a></td>
                            <td>{{ App\Library\Helper::formattedTime($comment->created_at) }}</td>
                            <td>{{ $comment->isShowing() }}</td>
                            <td style="min-width: 100px;">
                                <span>
                                    <form class="d-inline" action="{{ route('comment.enable', $comment->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-sm btn-primary" {{ $comment->is_enabled ? 'disabled' : '' }}>Enable</button>
                                    </form>
                                </span>
                                <span>
                                    <form class="d-inline" action="{{ route('comment.delete', $comment->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Delete</button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 mt-4 pt-2 pagination justify-content-center">
            @if($comments->count() && $comments instanceof Illuminate\Contracts\Pagination\Paginator)
            {{$comments->links()}}
            @endif
        </div><!--end col-->
    </div>
</div>
@endsection
