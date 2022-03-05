@extends('layout.form.skel')

@section('content')
<div class="container">
    @php use Illuminate\Support\Facades\Session; @endphp
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Notification</div>

                <div class="card-body">
                    @if( isset($success) )
                    <p class="alert alert-success">{{ $success }}</p>
                    @endif
                    
                    @if( isset($fail) )
                    <p class="alert alert-danger">{{ $fail }}</p>
                    @endif
                    
                    @if( isset($cancel) )
                    <p class="alert alert-info">{{ $cancel }}</p>
                    @endif
                    
                    @if ( isset($campaignId) )
                    <p>Go back to the <a href="{{ route('campaign.showGuestCampaign', $campaignId) }}">campaign</a> where you were donating for</p>
                    @endif
                    
                    <p>If you see yourself logged out, you can log in again after being redirected.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
