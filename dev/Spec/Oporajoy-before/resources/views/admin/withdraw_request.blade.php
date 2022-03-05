@extends('layouts.admin.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('content')
    <div id="page-wrapper">
        <div class="col-md-12">

                    @if( ! empty($title))
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="page-header"> {{ $title }}  </h1>
                            </div> <!-- /.col-lg-8 -->
                        </div> <!-- /.row -->
                    @endif

                    @include('admin.flash_msg')


                       <table class="table table-bordered table-striped">
                           <tr>
                               <th>User Name</th>
                               <th>Mobile No</th>
                               <th>Withdraw Amount</th>
                               <th>Bank Name</th>
                               <th>Account Name</th>
                               <th>Account Number</th>
                               <th>Requested Date</th>
                               <th>Status</th>
                           </tr>

                          <?php $total = 0; ?>

                           @foreach($withdraws as $withdraw)

                               <tr>

                                   <td>{{$withdraw->user->name}}</td>
                                   <td>{{$withdraw->user->phone}}</td>
                                   <td>{{get_amount($withdraw->withdraw_amount)}}</td>
                                   <td>{{$withdraw->bank_name}}</td>
                                   <td>{{$withdraw->account_name}}</td>
                                   <td>{{$withdraw->account_number}}</td>
                                   <td>{{$withdraw->created_at}}</td>
                                   <td>{{$withdraw->withdraw_status}}</td>

                               </tr>
                          @endforeach
                       </table>
        </div>
    </div>
@endsection
