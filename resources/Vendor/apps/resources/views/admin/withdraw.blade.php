@extends('layouts.admin.app')

@section('title') @if(! empty($title)) {{$title}} @endif - @parent @endsection

@section('content')
    <div id="page-wrapper">
        <div class="col-md-12">

                    @if( ! empty($title))
                        <div class="row">
                            <div class="col-lg-8">
                                <h1 class="page-header"> {{ $title }}  </h1>
                            </div> <!-- /.col-lg-8 -->
                            <div class="col-lg-4">
                              <h1 class="page-header"><a href="" class="btn btn-success" data-toggle="modal" data-target="#modalWithdrawForm">Get Withdraw Request</a></h1>
                            </div>
                        </div> <!-- /.row -->
                    @endif

                    @include('admin.flash_msg')


                       <table class="table table-bordered table-striped">
                           <tr>
                               <th>@lang('app.campaign_title')</th>
                               <th>@lang('app.raised')</th>
                               <th>@lang('app.your_commission')</th>
                           </tr>

                          <?php $total = 0; ?>

                           @foreach($campaigns as $campaign)

                               <tr>

                                   <td>{{$campaign->title}}</td>
                                   <td>{{get_amount($campaign->amount_raised()->amount_raised)}}</td>
                                   <td>{{get_amount($campaign->amount_raised()->campaign_owner_commission)}} ({{$campaign->campaign_owner_commission}}%)</td>

                               </tr>
                          <?php $total += $campaign->amount_raised()->campaign_owner_commission;?>

                           @endforeach
                          <tr>
                            <td colspan="3" style="text-align: right; font-weight: bold; font-size: 32px">Total = {{get_amount($total)}}</td>
                          </tr>
                          <tr>
                            <td colspan="3" style="text-align: right; font-weight: bold; font-size: 32px"> Withdraw Amount = {{get_amount($withdraw)}}</td>
                          </tr>
                          <tr>
                            <td colspan="3" style="text-align: right; font-weight: bold; font-size: 32px"> <?php $withdrawAmount = $total - $withdraw; ?> Withdrawable Amount = {{get_amount($withdrawAmount)}}</td>
                          </tr>
                       </table>
        </div>
    </div>

<div class="modal fade" id="modalWithdrawForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title font-weight-bold">Submit Withdraw Amount</h2>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fa fa-money prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="totalAmount">Total Amount:</label>
                    <input type="text" id="totalAmount" name="total_amount" class="form-control validate" value="{{$withdrawAmount}}" disabled="disabled">
                </div>
 
                <div class="md-form mb-5">
                    <i class="fa fa-money prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="withdrawAmount">Withdraw Amount:</label>
                    <input type="text" id="withdrawAmount" name="withdraw_amount" class="form-control validate" value="{{$withdrawAmount}}">
                </div>
                <hr>
                <h2>Account Details</h2>
                <div class="md-form mb-5">
                    <i class="fa fa-bank prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="bankName">Bank Name:</label>
                    <input type="text" id="bankName" name="bank_name" class="form-control validate" >
                </div>
                <div class="md-form mb-5">
                    <i class="fa fa-building prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="branchName">Branch Name:</label>
                    <input type="text" id="branchName" name="branch_name" class="form-control validate" >
                </div>
                <div class="md-form mb-5">
                    <i class="fa fa-user prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="accountName">A/C Name:</label>
                    <input type="text" id="accountName" name="account_name" class="form-control validate">
                </div>
                <div class="md-form mb-5">
                    <i class="fa fa-drafting-compass prefix grey-text"></i>
                    <label data-error="wrong" data-success="right" for="accountNumber">A/C Number:</label>
                    <input type="text" id="accountNumber" name="account_number" class="form-control validate">
                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="send" class="btn btn-info">Submit <i class="fa fa-paper-plane-o ml-1"></i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-js')
<script type='text/javascript'>
 $(function(){
  $("#withdrawAmount").on("keyup", function () {
    var fst=$("#totalAmount").val();
    var sec=$("#withdrawAmount").val();
    if (Number(sec)>Number(fst)) {
      alert("Withdraw amount should less than or equal total amount");
      $("#withdrawAmount").val(fst);
    return true;
    }
  })
})
$(document).ready(function(){
  $('#modalWithdrawForm').on('click', '.btn-info', function(e){

  var totalAmount     = $('#totalAmount').val();
  var withdrawAmount  = $('#withdrawAmount').val();
  var bankName        = $('#bankName').val();
  var branchName      = $('#branchName').val();
  var accountName     = $('#accountName').val();
  var accountNumber   = $('#accountNumber').val();
  var token           =  $('#token').val();

    $.post("/dashboard/withdraw", 
       { 
          total_amount:totalAmount,
          withdraw_amount:withdrawAmount,
          bank_name:bankName,
          branch_name: branchName,
          account_name:accountName,
          account_number:accountNumber,
          _token : token,
       },

    function(response){
        var obj = JSON.parse(response); 
          if(obj.status == 1)
          toastr.success(obj.msg);
          else
            toastr.warning(obj.msg);
      });
       
  $('#modalWithdrawForm').modal('hide');
  });
});
         
  </script>
@endsection